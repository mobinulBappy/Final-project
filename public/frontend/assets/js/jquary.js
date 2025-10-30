$(function(){

$('.cart-box').on('click',function(event){
   let reslutValue = $(this).children('.result').val();
   let target = $(event.target).data('type');
  
    if(target == 'inc'){
        $(this).children('.result').val(++reslutValue);
    }else if(target == 'dec'){
        if(reslutValue > 1){
        $(this).children('.result').val(--reslutValue);
        }
    }
  
   
   
})

})