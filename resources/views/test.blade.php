<script>
$("#add-coupon").validate({
rules: {
coupon_code: {
required: true,
       maxlength:8,
       minlength:6,
       alphanumeric: true
     },
     type:{
       required: true,
     },
     discount_per_fix:{
       required: true,
       number:true
     },
},
messages: {
 coupon_code: {
required: "Please Enter Coupon Code"
 },
     type: {
required: "Please Select Type"
     },
       discount_per_fix: {
required: "Please Enter Discount"
 }
},
errorElement: "em",
errorPlacement: function (error, element) {
// Add the `help-block` class to the error element
error.addClass("help-block");
if (element.prop("type") === "checkbox") {
error.insertAfter(element.parent("label"));
} else {
error.insertAfter(element);
}
},
highlight: function (element, errorClass, validClass) {
$(element).parents(".form-group").addClass("has-error").removeClass("has-success");
},

unhighlight: function (element, errorClass, validClass) {
$(element).parents(".form-group").addClass("has-success").removeClass("has-error");
},
submitHandler: function (form) {

 var type = $("select[name='type']").val();
 var discount_per_fix = $("#discount_per_fix").val();
 if(discount_per_fix==1 && discount_per_fix>100){
   toastr.error('Please enter less 100 Percentage');
 }

$("#btnCoupon").attr('disabled', 'disabled');
$.ajax({
type: "POST",
url: base_url + "save-coupon",
data: new FormData($("#add-coupon")[0]),
cache:false,
       contentType: false,
       processData: false,
success: function (data) {
data = JSON.parse(data);
if (data.status == 1) {
toastr.success("Coupon Saved Successfully...!!!");
setTimeout(function () {
window.location.href=base_url + "list-coupon";
},
2000);
} else {
toastr.error('Oops ! Error: Validation or Otherthing Went Wrong...');
$("#btnCoupon").attr('disabled', false);
}
}
});
return false;

}

});
</script>
