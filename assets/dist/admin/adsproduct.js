$(document).ready(function () {


 /*   $('.tools .ads-product-accept').text('Accept');
    $('.tools .ads-product-cancel').text('Cancel');*/

   if($('#grocery_type').val()=='Ads_type'){
       $('.sDiv>table').hide();
       $('input[type=radio_search_type]').hide();
       $('input[name=search_type]').val('advanced');
       $('.sDiv2>div').hide();
       $('.sDiv2>div').next().show();


    }
    else
   {
       $('.sDiv>table').hide();
       $('input[type=radio_search_type]').hide();
       $('input[name=search_type]').val('basic');
       $('.sDiv2>div').show();
       $('.sDiv2>div').next().hide();
   }

/*    $('.tools .ads-product-accept').click(function () {

        var ref = $(this).parent().find('.ads-accept').attr('data-id');

        var get_arr = ref.split('/');
        var id = get_arr[get_arr.length-1];

        console.log(id);

        $.ajax({
           type:'post',
           url:'adsproduct/ads_accept',
           data:{ads_id:id},
           success:function (data) {
                console.log('Accepted');
                $('.modal-title ').text('Accepted');
                $('.modal-body > p').text('Accept Request Successfully Done. This Ads has been accepted');
                $('#modal_open').click();
           },
           failure:function () {

           }
        });
    });
    $('.tools .ads-product-cancel').click(function () {

        var ref = $(this).parent().find('.ads-cancel').attr('data-id');
        $(this).removeAttr('href');
        var get_arr = ref.split('/');
        var id = get_arr[get_arr.length-1];
        $.ajax({
            type:'post',
            url:'adsproduct/ads_cancel',
            data:{ads_id:id},
            success:function (data) {
                console.log('Canceled');
                $('.modal-title ').text('Cancelled');
                $('.modal-body > p').text('Cancel Request Successfully Done. This Ads has been cancelled');
                $('#modal_open').click();
            },
            failure:function () {

            }
        });
    });*/
});