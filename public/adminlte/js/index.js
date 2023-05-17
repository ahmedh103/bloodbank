
$(document).on('click','.destory',function(){
var route =$(this).data('route');
var token =$(this).data('token');
var trObj = $(this);
if(confirm("Are you sure you want to remove this user?") == true){
$.ajax({
    url: route,
    type: 'Delete',
    data:{_method:'delete',_token:token},
    dataType: 'json',
    success: function(data) {
       if(data.status===0){

        swal.fire('خطأ',data.message,"error")
       }else{
        swal.fire('احسنت',data,"success")
        trObj.parents("tr").remove();
       }
    }
});
}

})









