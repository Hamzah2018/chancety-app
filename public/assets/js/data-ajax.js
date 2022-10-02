"use strict";
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var validator;
var validator_extra;
var phone_input;
var category_search = 0;
var myData = {};
var myCitiesData = {
    region_id: null
};
var sesstion_target_id = '';
var tables;
// Class definition
var extra_formjs = $('#form_extra');
var KTDatatablesServerSide = function () {
    var table;
    var dt;
    var dt_city;
    var form = document.getElementById('form_post');
    var formjs = $('#form_post');
    var extra_form = document.getElementById('form_extra');

    var modal = $('#m_store_modal') || null;
    var extraSubmitButton = document.getElementById('form_extra_submit');
    var filterPayment;
    // Private functions
    var initDatatable = function () {
        dt = $('#kt_datatable_example_1').DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            language: {
                info: ` عرض _START_ إلى _END_ من _TOTAL_`,
                // search: 'البحث'
            },
            // order: [[0, 'desc']],
            // stateSave: true,
            select: {
                style: 'os',
                selector: 'td:first-child',
                className: 'row-selected'
            },
            ajax: {
                url: window.datatable_url,
                data: function (d) {
                    return $.extend(d, myData);
                },
            },
            columns: window.columns,
            columnDefs: window.columnDefs,
            // Add data-filter attribute
        });
        dt_city = $('#kt_datatable_cities').DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            language: {
                info: ` عرض _START_ إلى _END_ من _TOTAL_`,
                // search: 'البحث'
            },
            // order: [[0, 'desc']],
            // stateSave: true,
            select: {
                style: 'os',
                selector: 'td:first-child',
                className: 'row-selected'
            },
            ajax: {
                url: window.datatable_cities_url,
                data: function (d) {
                    return $.extend(d, myCitiesData);
                },
            },
            columns: window.city_columns,
            columnDefs: window.city_columnDefs,
            // Add data-filter attribute
        });
        table = dt.$;
        tables = dt;
        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on('draw', function () {
            if ($(".datatable-checkbox").length > 0) {
                initToggleToolbar();
                toggleToolbars();
            }
            handleDeleteRows();
            KTMenu.createInstances();
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
        dt_city.on('draw', function () {
            if ($("#kt_datatable_example_1").length > 0) {
                initToggleToolbar();
                toggleToolbars();
            }

            handleDeleteRows();
            KTMenu.createInstances();
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    };
    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
        // const sub_filterSearch = document.querySelector('[data-kt-docs-table-filter="sub_search"]');
        const filterCategory = document.querySelector('[data-kt-docs-table-filter="category"]');
        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
        // $(document).on('keyup' , '.search' , function (e) {
        //     dt_city.search(e.target.value).draw();
        // });
        $(document).on('keyup' , '.sub_search' , function (e) {
            dt_city.search(e.target.value).draw();
        });

        $(document).on('change', '.category_search', e => {
            let $this = $(e.currentTarget);
            myData.category_search = $this.val();
            dt.ajax.reload();
        });
        $(document).on('change', '#active_search', e => {
            let $this = $(e.currentTarget);
            myData.active_search = $this.val();
            dt.ajax.reload();
        });
        $(document).on('change', '#block_search', e => {
            let $this = $(e.currentTarget);
            myData.block_search = $this.val();
            dt.ajax.reload();
        });
    };
    var handleSubDatatableShow = () => {
        $(document).on('click' , '#kt_datatable_example_1 .edit_sub_datatable' , e => {
            let $this = $(e.currentTarget);
            let id = $this.data('id');
            myCitiesData.region_id = id;
            dt_city.ajax.reload();
            let title = $this.data('title');
            $("#m_cities_modal .span_title").text(title);
            $("#create_city_form").data('parent' , id);
            $("#m_cities_modal").modal('show');
        });
    };
    var initFormValidation = () => {
        validator = FormValidation.formValidation(
            document.getElementById('form_post'),
            {
                plugins: {
                    declarative: new FormValidation.plugins.Declarative({
                        html5Input: true,
                        prefix: 'data-fv-',
                    }),
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    }),
                }
            }
        );

        if (extra_formjs.length > 0) {
            validator_extra = FormValidation.formValidation(
                document.getElementById('form_extra'),
                {
                    plugins: {
                        declarative: new FormValidation.plugins.Declarative({
                            html5Input: true,
                            prefix: 'data-fv-',
                        }),
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        }),
                    }
                }
            );
        }
    };
    var initExtraFormValidation = () => {

        if (extra_formjs.length > 0) {
            validator_extra = FormValidation.formValidation(
                document.getElementById('form_extra'),
                {
                    plugins: {
                        declarative: new FormValidation.plugins.Declarative({
                            html5Input: true,
                            prefix: 'data-fv-',
                        }),
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        }),
                    }
                }
            );
        }
    };
    var handleCreateForm = () => {
        let createForm = $("#store_form").val();
        $(document).on('click', '#create_form', function (e) {
            e.preventDefault();
            axios.get(window.create).then(response => {
                if (response.data.status == true) {
                    $("#m_store_modal .modal-content").empty().append(response.data.item.form);
                    $('#category_main').select2();
                    $('#category_sub_sub').select2();
                    $('.select22').select2();
                    KTImageInput.createInstances();
                    $('.summernote').summernote({
                        placeholder: 'المحتوى',
                        height: 250
                    });
                    if ($(".phone-input").length > 0) {
                        var input = document.querySelector(".phone-input");
                        phone_input = intlTelInput(input, {
                            initialCountry: "ps",
                            hiddenInput: 'country_code',
                            nationalMode: false,
                            autoHideDialCode: false,
                            separateDialCode: true
                        });
                    }
                    initFormValidation();
                    $("#m_store_modal").modal("show");
                }
            });
        });
        $(document).on('click', '#create_city_form', function (e) {
            e.preventDefault();
            let action = $(this).data('action');
            let parent = $(this).data('parent');
            axios.get(`${action}/${parent}`).then(response => {
                if (response.data.status == true) {
                    $("#m_store_modal .modal-content").empty().append(response.data.item.form);
                    $('#category_main').select2();
                    $('#category_sub_sub').select2();
                    $('.select22').select2();
                    KTImageInput.createInstances();
                    $('.summernote').summernote({
                        placeholder: 'المحتوى',
                        height: 250
                    });
                    if ($(".phone-input").length > 0) {
                        var input = document.querySelector(".phone-input");
                        phone_input = intlTelInput(input, {
                            initialCountry: "ps",
                            hiddenInput: 'country_code',
                            nationalMode: false,
                            autoHideDialCode: false,
                            separateDialCode: true
                        });
                    }
                    initFormValidation();
                    $("#m_store_modal").modal("show");
                }
            });
        });
    };
    var handleStoreToDatatable = () => {
        $(document).on('click', '#form_submit', function (e) {
            e.preventDefault();
            let submitButton = $(this);
            if (validator) {
                validator.validate().then(function (status) {
                    if (status === 'Valid') {
                        submitButton.attr('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        $('.summernote').each(function () {
                            $(this).summernote("code", $(this).summernote('code').replace(/(<div)/igm, '<p').replace(/<\/div>/igm, '</p>').replace(/<p><\/p>/igm, ''));
                        });
                        // $(form).each(function () {
                        //     if ($(this).data('validator'))
                        //         $(this).data('validator').settings.ignore = ".note-editor *";
                        // });
                        var formData = new FormData($('#form_post')[0]);
                        var url = $('#form_post').attr('action');
                        var _method;
                        _method = $('#form_post').attr('method');
                        let sub_operation = '';
                        if($("#form_post .operation").length > 0) {
                            sub_operation = $("#form_post .operation").val();
                        }
                        console.log(sub_operation)
                        $.ajax({
                            url: url,
                            method: _method,
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                if (response.status) {
                                    if (modal) {
                                        modal.modal('hide');
                                        // $(form).reset();

                                    }
                                    customSweetAlert(
                                        'success',
                                        response.message,
                                        response.item,
                                        function (event) {
                                            submitButton.attr('data-kt-indicator', '0');
                                            submitButton.disabled = false;
                                            if(sub_operation !== '') {
                                                dt_city.draw();

                                            }else {
                                                dt.draw();

                                            }
                                        }
                                    );
                                } else {
                                    customSweetAlert(
                                        'error',
                                        response.message,
                                        response.errors_object
                                    );
                                }
                            },
                            error: function (jqXhr) {
                                submitButton.attr('data-kt-indicator', '0');
                                getErrors(jqXhr, '/admin/login');
                            }
                        });
                    }
                });
            }
        });

        if (extra_formjs.length > 0) {
            $(document).on('click', '#form_extra_submit', function (e) {

                e.preventDefault();
                let submitButton = $(this);
                if (validator_extra) {
                    validator_extra.validate().then(function (status) {
                        if (status === 'Valid') {
                            submitButton.attr('data-kt-indicator', 'on');
                            submitButton.disabled = true;
                            $('.summernote').each(function () {
                                $(this).summernote("code", $(this).summernote('code').replace(/(<div)/igm, '<p').replace(/<\/div>/igm, '</p>').replace(/<p><\/p>/igm, ''));
                            });
                            $(form).each(function () {
                                if ($(this).data('validator'))
                                    $(this).data('validator').settings.ignore = ".note-editor *";
                            });
                            var formData = new FormData($('#form_extra')[0]);
                            var url = $('#form_extra').attr('action');
                            var _method;
                            _method = $('#form_extra').attr('method');
                            axios.post(`${url}` , formData).then(response => {
                                if (response.status) {
                                        $("#m_reject_modal").modal('hide');
                                    submitButton.attr('data-kt-indicator', 'off');
                                    submitButton.disabled = false;

                                    customSweetAlert(
                                        'success',
                                        response.data.message,
                                        '',
                                        function (event) {
                                            submitButton.attr('data-kt-indicator', '0');
                                            submitButton.disabled = false;
                                            $('#form_extra .reason').val('');
                                            dt.draw();
                                        }
                                    );
                                } else {
                                    submitButton.attr('data-kt-indicator', 'off');
                                    submitButton.disabled = false;
                                    customSweetAlert(
                                        'error',
                                        response.data.message,
                                        ''
                                    );
                                }
                            }).catch(err => {
                                submitButton.attr('data-kt-indicator', 'off');
                                submitButton.disabled = false;
                                customSweetAlert(
                                    'error',
                                    err.response.data.message,
                                    ''
                                );
                            });
                        }
                    });
                }
            });
        }
    };
    // Filter Datatable
    // Delete customer
    var handleShowEditModal = () => {
        if (sesstion_target_id != '') {
            axios.get(`${sesstion_target_id}`).then(response => {
                if (response.data.status == true) {
                    $("#m_store_modal .modal-content").empty().append(response.data.item.render);
                    KTImageInput.createInstances();
                    $('#category_main').select2();
                    $('#category_sub_sub').select2();
                    $('.summernote').summernote({
                        placeholder: 'المحتوى',
                        height: 250
                    });
                    if ($(".phone-input").length > 0) {
                        var input = document.querySelector(".phone-input");
                        phone_input = intlTelInput(input, {
                            initialCountry: "ps",
                            hiddenInput: 'country_code',
                            nationalMode: false,
                            autoHideDialCode: false,
                            separateDialCode: true
                        });
                        $(".phone-input").blur();
                    }
                    initFormValidation();
                    $("#m_store_modal").modal("show");
                }
            }).catch(err => {
                customSweetAlert(
                    'error',
                    err.response.data.message,
                    ''
                );
            });
        }
    };
    var handleShowRows = () => {
        $(document).on('click', '.edit', e => {
            e.preventDefault();
            let $this = $(e.currentTarget);
            let target_url = $this.data('url');
            axios.get(`${target_url}`).then(response => {
                if (response.data.status == true) {
                    $("#m_store_modal .modal-content").empty().append(response.data.item.render);
                    KTImageInput.createInstances();
                    $('#category_main').select2();
                    $('#category_sub_sub').select2();
                    $('.summernote').summernote({
                        placeholder: 'المحتوى',
                        height: 250
                    });
                    if ($(".phone-input").length > 0) {
                        var input = document.querySelector(".phone-input");
                        phone_input = intlTelInput(input, {
                            initialCountry: "ps",
                            hiddenInput: 'country_code',
                            nationalMode: false,
                            autoHideDialCode: false,
                            separateDialCode: true
                        });
                        $(".phone-input").blur();
                    }
                    initFormValidation();
                    $("#m_store_modal").modal("show");
                }
            }).catch(err => {
                customSweetAlert(
                    'error',
                    err.response.data.message,
                    ''
                );
            });
        });

    };
    var handleDeleteRows = () => {
        const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');
        deleteButtons.forEach(d => {
            d.addEventListener('click', function (e) {
                e.preventDefault();
                let target_url = e.target.getAttribute('data-action');
                let sub_table = e.target.getAttribute('data-table');

                const parent = e.target.closest('tr');
                const customerName = parent.querySelectorAll('td')[1].innerText;
                Swal.fire({
                    text: `هل تريد حذف ${customerName} ؟`,
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "قم بالحذف",
                    cancelButtonText: "إغلاق",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            text: "يتم حذف " + customerName + 'الرجاء الإنتظار',
                            icon: "info",
                            buttonsStyling: false,
                            showConfirmButton: false,
                        });
                        axios.delete(`${target_url}`).then(response => {
                            if (response.data.status == true) {
                                Swal.close();

                                Swal.fire({
                                    text: "تم حذف " + customerName + "بنجاح",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "تم",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {
                                    console.log(sub_table)
                                    if(sub_table !== '' && sub_table !== undefined && sub_table !== null) {
                                        dt_city.draw();
                                    }else {
                                        dt.draw();
                                    }
                                });
                            } else {
                                Swal.close();
                                Swal.fire({
                                    text: customerName + " لم يتم حذفه",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "تم",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                });
                            }
                        }).catch(err => {
                            customSweetAlert(
                                'error',
                                err.response.data.message,
                                ''
                            );
                        });
                    } else if (result.dismiss) {
                        Swal.fire({
                            text: customerName + " لم يتم حذفه",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "تم",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    };
    var handelTrustOperation = () => {
        $(document).on('click', '.cancel_verification', e => {
            e.preventDefault();
            let $this = $(e.currentTarget);
            let target_url = $this.data('url');
            let customerName = $this.data('title');
            Swal.fire({
                text: 'هل أنت متأكد من العملية ؟',
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: 'أجل',
                cancelButtonText: "إغلاق",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(result => {

                if (result.value) {
                    Swal.fire({
                        text: "الرجاء الإنتظار ",
                        icon: "info",
                        buttonsStyling: false,
                        showConfirmButton: false,
                    });
                    axios.post(`${target_url}`)
                        .then(response => {
                            Swal.close();
                            if (response.data.status == true) {
                                $("#m_reports_details_modal").modal('hide');
                                Swal.fire({
                                    text: response.data.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "تم",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {
                                    dt.draw();
                                });
                            }
                        }).catch(err => {
                        Swal.close();
                        customSweetAlert(
                            'error',
                            err.response.data.message,
                            ''
                        );
                    });
                }
            });
        });
    };
    var VertifyReqOperation = () => {
        $(document).on('click', '#kt_datatable_example_1 .vertify', e => {
            e.preventDefault();
            let $this = $(e.currentTarget);
            let target_url = $this.data('url');
            let title = $this.data('title');
            swal.fire({
                title: `هل أنت متأكد من العملية ؟`,
                icon: 'question',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'موافق',
                cancelButtonText: 'إغلاق',
                confirmButtonColor: '#56ace0',
                allowOutsideClick: false
            }).then(result => {
                if (result.value) {
                    Swal.fire({
                        text: "الرجاء الإنتظار ",
                        icon: "info",
                        buttonsStyling: false,
                        showConfirmButton: false,
                    });
                    axios.post(`${target_url}`)
                        .then(response => {
                            Swal.close();
                            if (response.data.status == true) {
                                $("#m_reports_details_modal").modal('hide');
                                Swal.fire({
                                    text: response.data.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "تم",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {
                                    dt.draw();
                                });
                            }
                        }).catch(err => {
                        Swal.close();
                        customSweetAlert(
                            'error',
                            err.response.data.message,
                            ''
                        );
                    });
                }
            });
        });

    }
    var handelBlockOperation = () => {
        $(document).on('click', '.block', e => {
            e.preventDefault();
            let $this = $(e.currentTarget);
            let target_url = $this.data('url');
            let customerName = $this.data('title');
            Swal.fire({
                text: 'هل أنت متأكد من العملية ؟',
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: 'حظر',
                cancelButtonText: "إغلاق",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(result => {
                if (result.value) {
                    Swal.fire({
                        text: "الرجاء الإنتظار ",
                        icon: "info",
                        buttonsStyling: false,
                        showConfirmButton: false,
                    });
                    axios.post(`${target_url}`)
                        .then(response => {
                            Swal.close();
                            if (response.data.status == true) {
                                $("#m_reports_details_modal").modal('hide');
                                Swal.fire({
                                    text: response.data.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "تم",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {

                                    dt.draw();
                                });
                            }
                        }).catch(err => {
                        Swal.close();
                        customSweetAlert(
                            'error',
                            err.response.data.message,
                            ''
                        );
                    });
                }
            });
        });
    }
    var handelIgnoreOperation = () => {
        $(document).on('click', '.ignore', e => {
            e.preventDefault();
            let $this = $(e.currentTarget);
            let target_url = $this.data('url');
            let customerName = $this.data('title');
            Swal.fire({
                text: 'هل أنت متأكد من العملية ؟',
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: 'تجاهل',
                cancelButtonText: "إغلاق",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(result => {
                if (result.value) {
                    Swal.fire({
                        text: "الرجاء الإنتظار ",
                        icon: "info",
                        buttonsStyling: false,
                        showConfirmButton: false,
                    });
                    axios.post(`${target_url}`)
                        .then(response => {
                            Swal.close();
                            if (response.data.status == true) {
                                $("#m_reports_details_modal").modal('hide');
                                Swal.fire({
                                    text: response.data.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "تم",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {

                                    dt.draw();
                                });
                            }
                        }).catch(err => {
                        Swal.close();
                        customSweetAlert(
                            'error',
                            err.response.data.message,
                            ''
                        );
                    });
                }
            });
        });
    }
    var handleActiveOperation = () => {
        $(document).on('change', '.active_operation', e => {
            e.preventDefault();
            console.log('activation')
            let $this = $(e.currentTarget);
            let target_url = $this.data('url');
            let customerName = $this.data('title');
            let textCheck;
            let confirmActive;
            if ($this.is(':checked')) {
                $this.prop('checked', false);
                textCheck = `هل تريد تفعيل ${customerName} ؟`;
                confirmActive = "تفعيل";
            } else {
                $this.prop('checked', true);
                textCheck = `هل تريد إلغاء تفعيل ${customerName} ؟`;
                confirmActive = "إلغاء التفعيل";
            }
            Swal.fire({
                text: textCheck,
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: confirmActive,
                cancelButtonText: "إغلاق",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        text: "الرجاء الإنتظار ",
                        icon: "info",
                        buttonsStyling: false,
                        showConfirmButton: false,
                    });
                    axios.post(`${target_url}`).then(response => {
                        if (response.data.status == true) {
                            Swal.close();
                            if ($this.is(':checked')) {
                                $this.prop('checked', false);
                            } else {
                                $this.prop('checked', true);
                            }
                            Swal.fire({
                                text: "تمت العملية بنجاح",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "تم",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function () {

                                dt.draw();
                            });
                        } else {
                            Swal.close();
                        }
                    }).catch(err => {
                        customSweetAlert(
                            'error',
                            err.response.data.message,
                            ''
                        );
                    });

                } else if (result.dismiss) {
                    Swal.close();
                    Swal.fire({
                        text: " لم يتم تغيير حالة " + customerName,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "تم",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        });
        $(document).on('change', '.feature_operation', e => {
            e.preventDefault();
            let $this = $(e.currentTarget);
            let target_url = $this.data('url');
            let customerName = $this.data('title');
            let textCheck;
            let confirmActive;
            if ($this.is(':checked')) {
                $this.prop('checked', false);
                textCheck = `هل تريد إظهاره في التطبيق ${customerName} ؟`;
                confirmActive = "إظهار";
            } else {
                $this.prop('checked', true);
                textCheck = `هل تريد إخفائه في التطبيق ${customerName} ؟`;
                confirmActive = "إخفاء";
            }
            Swal.fire({
                text: textCheck,
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: confirmActive,
                cancelButtonText: "إغلاق",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        text: "الرجاء الإنتظار ",
                        icon: "info",
                        buttonsStyling: false,
                        showConfirmButton: false,
                    });
                    axios.post(`${target_url}`).then(response => {
                        if (response.data.status == true) {
                            Swal.close();
                            if ($this.is(':checked')) {
                                $this.prop('checked', false);
                            } else {
                                $this.prop('checked', true);
                            }
                            Swal.fire({
                                text: "تمت العملية بنجاح",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "تم",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function () {

                                dt.draw();
                            });
                        } else {
                            Swal.close();
                        }
                    }).catch(err => {
                        customSweetAlert(
                            'error',
                            err.response.data.message,
                            ''
                        );
                    });

                } else if (result.dismiss) {
                    Swal.close();
                    Swal.fire({
                        text: " لم يتم تغيير حالة " + customerName,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "تم",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        });
    };


    var getErrors = (jqXhr, path) => {
        if (jqXhr != null)
            switch (jqXhr.status) {
                case 401 :
                    // $(location).prop('pathname', path);
                    // break;
                    customSweetAlert(
                        'error',
                        jqXhr.responseJSON.message,
                        ''
                    );
                case 400 :
                    customSweetAlert(
                        'error',
                        jqXhr.responseJSON.message,
                        ''
                    );
                    break;
                case 422 :
                    (function ($) {
                        var $errors = jqXhr.responseJSON;
                        var errorsHtml = '<ul style="list-style-type: none">';
                        $.each($errors, function (key, value) {
                            // form.find(".my-validate")
                            errorsHtml += '<li style="font-family: \'Droid.Arabic.Kufi\' !important; text-align: right">' + value[0] + '</li>';

                        });
                        errorsHtml += '</ul>';
                        customSweetAlert(
                            'error',
                            'حدث خطأ أثناء العملية',
                            errorsHtml
                        );
                    })(jQuery);

                    break;
                default:
                    errorCustomSweet();
                    break;
            }
        return false;
    }
    // Init toggle toolbar
    var initToggleToolbar = function () {
        const container = document.querySelector('#kt_datatable_example_1');
        const checkboxes = container.querySelectorAll('.datatable-checkbox');
        $(document).on('click', '.check-all-datatable', e => {
            let $this = $(e.currentTarget);
            if ($this.is(':checked')) {
                $this.prop('checked', true);
                $(".datatable-checkbox").prop('checked', true);
                toggleToolbars();
            } else {
                $this.prop('checked', false);
                $(".datatable-checkbox").prop('checked', false);
                toggleToolbars();
            }
        });
        $(document).on('click', '.sub-check-all-datatable', e => {
            let $this = $(e.currentTarget);
            if ($this.is(':checked')) {
                $this.prop('checked', true);
                $(".sub-datatable-checkbox").prop('checked', true);
                toggleToolbars();
            } else {
                $this.prop('checked', false);
                $(".sub-datatable-checkbox").prop('checked', false);
                toggleToolbars();
            }
        });
        $(document).on('click', '.datatable-checkbox', () => {
            setTimeout(function () {
                toggleToolbars();
            }, 50);
        });
        $(document).on('click', '.sub-datatable-checkbox', () => {
            setTimeout(function () {
                toggleToolbars();
            }, 50);
        });
        const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');
        deleteSelected.addEventListener('click', function (e) {
            // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
            let target_url = e.target.getAttribute('data-url');
            Swal.fire({
                text: "هل تريد حذف هذه البيانات ؟",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                showLoaderOnConfirm: true,
                confirmButtonText: "قم بالحذف",
                cancelButtonText: "إغلاق",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                },
            }).then(function (result) {
                if (result.value) {
                    let ids = [];
                    $(".datatable-checkbox").each(function () {
                        if (this.checked) {
                            ids.push($(this).val());
                        }
                    });
                    $.ajax({
                        url: target_url,
                        method: 'post',
                        type: 'json',
                        data: {
                            id: ids
                        },
                        beforeSend: function (xhr) {
                            Swal.fire({
                                text: "يتم حذف البيانات الرجاء الإنتظار ",
                                icon: "info",
                                buttonsStyling: false,
                                showConfirmButton: false,
                            });
                        },
                        success: function (response) {
                            Swal.close();
                            if (response.status == true) {
                                Swal.fire({
                                    text: "تم حذف البيانات بنجاح",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "تم",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {
                                    // delete row data from server and re-draw datatable
                                    dt.draw();
                                });
                                const headerCheckbox = container.querySelectorAll('[type="checkbox"]')[0];
                                headerCheckbox.checked = false;
                            }
                        },
                        error: function (response) {
                            toastr.error(response.responseJSON.message);
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "لم يتم حذف البيانات المحددة",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "تم",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        });
        const sub_deleteSelected = document.querySelector('[data-kt-docs-table-select="sub_delete_selected"]');
        if(sub_deleteSelected !== null) {
            sub_deleteSelected.addEventListener('click', function (e) {
                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                let target_url = e.target.getAttribute('data-url');
                Swal.fire({
                    text: "هل تريد حذف هذه البيانات ؟",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    showLoaderOnConfirm: true,
                    confirmButtonText: "قم بالحذف",
                    cancelButtonText: "إغلاق",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    },
                }).then(function (result) {
                    if (result.value) {
                        let ids = [];
                        $(".sub-datatable-checkbox").each(function () {
                            if (this.checked) {
                                ids.push($(this).val());
                            }
                        });
                        $.ajax({
                            url: target_url,
                            method: 'post',
                            type: 'json',
                            data: {
                                id: ids
                            },
                            beforeSend: function (xhr) {
                                Swal.fire({
                                    text: "يتم حذف البيانات الرجاء الإنتظار ",
                                    icon: "info",
                                    buttonsStyling: false,
                                    showConfirmButton: false,
                                });
                            },
                            success: function (response) {
                                Swal.close();
                                if (response.status == true) {
                                    Swal.fire({
                                        text: "تم حذف البيانات بنجاح",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "تم",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function () {
                                        // delete row data from server and re-draw datatable
                                        dt_city.draw();
                                    });
                                    const headerCheckbox = container.querySelectorAll('[type="checkbox"]')[0];
                                    headerCheckbox.checked = false;
                                }
                            },
                            error: function (response) {
                                toastr.error(response.responseJSON.message);
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: "لم يتم حذف البيانات المحددة",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "تم",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            });
        }
    };
    // Toggle toolbars
    var toggleToolbars = function () {
        // Define variables
        const container = document.querySelector('#kt_datatable_example_1');
        const toolbarBase = document.querySelector('[data-kt-docs-table-toolbar="base"]');
        const toolbarSelected = document.querySelector('[data-kt-docs-table-toolbar="selected"]');
        const selectedCount = document.querySelector('[data-kt-docs-table-select="selected_count"]');
        // Select refreshed checkbox DOM elements
        const allCheckboxes = container.querySelectorAll('tbody .datatable-checkbox');
        let checkedState = false;
        let count = 0;
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });
        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add('d-none');
            toolbarSelected.classList.remove('d-none');
        } else {
            toolbarBase.classList.remove('d-none');
            toolbarSelected.classList.add('d-none');
        }

        const sub_container = document.querySelector('#kt_datatable_cities');
        if(sub_container !== null) {
            const sub_toolbarBase = document.querySelector('[data-kt-docs-table-toolbar="sub"]');
            const sub_toolbarSelected = document.querySelector('[data-kt-docs-table-toolbar="sub_selected"]');
            const sub_selectedCount = document.querySelector('[data-kt-docs-table-select="sub_selected_count"]');
            const sub_allCheckboxes = sub_container.querySelectorAll('tbody .sub-datatable-checkbox');
            let sub_checkedState = false;
            let sub_count = 0;
            sub_allCheckboxes.forEach(c => {
                if (c.checked) {
                    sub_checkedState = true;
                    sub_count++;
                }
            });
            // Toggle toolbars
            if (sub_checkedState) {
                sub_selectedCount.innerHTML = sub_count;
                sub_toolbarBase.classList.add('d-none');
                sub_toolbarSelected.classList.remove('d-none');
            } else {
                sub_toolbarBase.classList.remove('d-none');
                sub_toolbarSelected.classList.add('d-none');
            }
        }

    };
    return {
        init: function () {
            initDatatable();
            if ($("#form_post").length > 0) {
                initFormValidation();
            }
            handleSubDatatableShow();
            handleStoreToDatatable();
            handleSearchDatatable();
            if ($(".datatable-checkbox").length > 0) {
                initToggleToolbar();
            }
            if (extra_formjs.length > 0) {
                initExtraFormValidation();
            }
            handleCreateForm();
            handleShowRows();
            handleDeleteRows();
            handleShowEditModal();
            getErrors();
            handleActiveOperation();
            handelIgnoreOperation();
            handelBlockOperation();
            handelTrustOperation();
            VertifyReqOperation();
        }
    };
}();
// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});
$(document).ready(() => {
    $(document).on("blur", ".phone-input", e => {
        let $this = $(e.currentTarget);
        $this.parent().find("input[name='country_code']").val('+' + phone_input.getSelectedCountryData().dialCode)
    });
});
var handelLimitSubmitButtons = (validator, formjs , submitButton , modal = null) => {
    let validatorCheck;
    if(validator === 'limit_validator') {
        validatorCheck = limit_validator;
    }
    if (validatorCheck) {
        validatorCheck.validate().then(function (status) {
            if (status == 'Valid') {
                let ids = [];
                $(".datatable-checkbox").each(function () {
                    if (this.checked) {
                        ids.push($(this).val());
                    }
                });
                var formData = new FormData(formjs[0]);
                for (let i in ids) {
                    formData.append('ids[]' , ids[i]);
                }

                var url = formjs.attr('action');
                var _method = formjs.attr('method');
                submitButton.attr('data-kt-indicator', 'on');
                submitButton.attr('disabled', true);
                axios.post(`${url}` , formData).then(response => {
                    if (response.data.status == true) {
                        submitButton.attr('data-kt-indicator', 'off');
                        submitButton.attr('disabled', false);
                        tables.draw();
                        if (modal) {
                            modal.modal('hide');
                            validatorCheck.resetForm(true);
                        }
                        customSweetAlert(
                            'success',
                            response.data.message,
                            '',
                            function (event) {
                                if(response.data.item.model == 'limit') {

                                }
                            }
                        );
                    } else {
                        submitButton.attr('data-kt-indicator', 'off');
                        submitButton.attr('disabled', false);
                        customSweetAlert(
                            'error',
                            response.message,
                            response.errors_object
                        );
                    }
                }).catch(err => {
                    submitButton.attr('data-kt-indicator', 'off');
                    submitButton.attr('disabled', false);
                    customSweetAlert(
                        'error',
                        err.response.data.message,
                        ''
                    );
                });
            }
        });
    }
}
function initForm(validator) {
    return validator = FormValidation.formValidation(
        document.getElementById('form_post'),
        {
            plugins: {
                declarative: new FormValidation.plugins.Declarative({
                    html5Input: true,
                    prefix: 'data-fv-',
                }),
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: '',
                    eleValidClass: ''
                }),

            }
        }
    );
}
