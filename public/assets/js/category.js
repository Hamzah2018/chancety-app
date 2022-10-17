window.columns = [
    {data: 'id'},
    {data: 'name'},
    {data: 'description'},
    {data: 'active'},
    // {data: null},
    {data: 'options'},
];
window.columnDefs = [
    {
        targets: 0,
        orderable: false,
        sorting:false
        // render: function (data) {
        //     return `
        //                     <div class="form-check form-check-sm form-check-custom form-check-solid">
        //                         <input class="form-check-input datatable-checkbox" type="checkbox" value="${data}" />
        //                     </div>`;
        // }

    },
    {
        targets: -1,
        orderable: false,
    },
];

$(document).ready(() => {
    $(document).on('change' , '#form_post .page_type' , e => {
        let $this = $(e.currentTarget);
        if($this.val() == 2) {
            $("#form_post .page_type_page").each(function () {
                $(this).removeClass('d-none');
            });
        }else {
            $("#form_post .page_type_page").each(function () {
                $(this).addClass('d-none');
            });
        }
    });
});
