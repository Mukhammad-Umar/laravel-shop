$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/* $(document).ready(function(){
    // ...
}); */

var BaseRecord = {
    search: function (value) {
        var ajaxSetting = {
            method: 'get',
            url: './shop',
            data: {
                search: value,
            },
            success: function (data) {
                // alert(data.table);
                $('.product-sec1').html(data.table);
            }
        };
        $.ajax(ajaxSetting);
    },

    removeone: function (id) {
        var ajaxSetting = {
            method: "post",
            url: './deleteone',
            data: {
                id: id,
            },
            success: function (data) {
                // alert(id);
                BaseRecord.cart();
            }
        };
        $.ajax(ajaxSetting);
    },

    removeall: function () {
        var ajaxSetting = {
            method: "post",
            url: './clearall',
            success: function (data) {
                BaseRecord.cart();
            }
        };
        $.ajax(ajaxSetting);
    },

    cart: function () {
        var ajaxSetting = {
            method: "get",
            url: './checkout',
            success: function (data) {
                $('.cart_items_list').html(data.table);

                $('.listbuttonremove').click(function () {
                    BaseRecord.removeone($(this).attr('id'));
                });
            },
        };
        $.ajax(ajaxSetting);
    },

    mailer: function (value) {
        var ajaxSetting = {
            method: "post",
            url: './mailer',
            data: {
                email: value,
            },
            success: function (data) {
                // alert(data.answer);
                if (data.answer) { 
                    var data_json = JSON.parse(data.answer);
                    if (data_json['mail']) alert('We sent the message to your email!');
                } else {
                    var data_json = JSON.parse(data);
                    var error_str = '';
                    for (var i in data_json) {
                        error_str += data_json[i] + '\n';
                    }
                    alert(error_str);
                }
            },
        };
        $.ajax(ajaxSetting);
    },

};