@extends('layouts.frontend-layout')

@section('content')

 <section id="product" class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                  <h4>
                    Categories
                    <hr>
                  </h4>
                <ul class="mt-3">
                  @foreach ($categories as $category)
                  <li>
                    <input type="checkbox" class="me-2" value="{{ $category->slug }}" name="categories" id="category{{ $category->id }}">
                    <label for="category{{ $category->id }}">{{ str($category->title)->headline() }}</label>
                  </li>
                  @endforeach
                </ul>

        <div class="toggle-list product-price-range active mt-3">
        <h6 class="title">PRICE</h6>
        <hr>
        <div class="shop-submenu">
            <form action="shop-sidebar.html#" class="mt-25">            
                <div id="slider-range"></div>       
                <div class="flex-center mt-20">
                  <span>Price:</span>
                <input type="text" id="amount" class="amount-range border-0 mt-1" readonly>
                </div>
            </form>
        </div>
      </div>
</div>
                <div class="col-lg-9">
                <div class="text-end">
                  <select name="shorting" class="py-2 px-5 mb-1">
                  <option value="created_at:desc">Shorts by Latest</option>
                  <option value="created_at:asc">Shorts by Oldest</option>
                  <option value="price:asc">Low Price</option>
                  <option value="price:desc">High Price</option>
                </select>
                </div>

                  <div class="d-flex flex-wrap productArea">
                   
                 <div class="mt-2">
                  {{ $products->links() }}
                 </div>
                </div>
                </div>
            </div>
        </div>
    </section>


@push('scripts')
<script>

  const categoryValu = []
  const priceVlue = {
    min:0,
    max:99999999,
  }
  const orderValue = {
    order:'created_at',
    sort:'desc'
  }
  $('input[name="categories"]').change(function(event){

    if($(this).is(':checked')){
    categoryValu.push($(this).val());
    }else{
    categoryValu.splice(categoryValu.indexOf($(this).val()),1);
    }
    getProductFilter(categoryValu, priceVlue, orderValue);
  })


  function getProductFilter(category=null, price=null, ordering=null){

      $.ajax({
        url: "{{ route('frontend.shopfilter') }}",
        method : 'get',
        data:{
          categories: category,
          price: price,
          ordering: ordering
        },
        success:function(res){
          const productList=[]
          res.map(product => {
            let url = '{{ route('frontend.product.sidbar','::slug') }}'
             url = url.replace('::slug', product.slug);
             
             let productHtml =`
              <div class="col-lg-4">
                    <div class="product-cart m-1">
                        <div class="product-cart-img">
                        <img style="max-height:190px" src="${product.image ?`{{ asset('storage') }}/`+product.image:`{{ asset('istockphoto.jpg') }}` }" alt="" class="img-fluid">
                    </div>
                    <div class="product-cart-info">
                        <h5>${product.title}</h5>
                        <p>
                        ${
                          product.sell_price ? (`<ins>${product.sell_price}Tk</ins>
                          <del>${product.price}Tk</del>`) : (`<ins>${product.price}Tk</ins>`)
                        }
                        </p>
                        <a href="${url}"><button><i class="fa-solid fa-cart-shopping"></i>Order Now</button></a>
                    </div>
                     <div class="discount">
                    ${
                        product.sell_price ? `<span>${Math.ceil(((product.price-product.sell_price)*100)/product.price)}%</span>`:null
                    }
                    </div>
                    </div>
                </div>
             `
              productList.push(productHtml);
              
          })
          $('.productArea').html(productList)
        }
      })
  }



  $("#slider-range").slider({
        range: true,
        min: 0,
        max: 50000, 
        values: [0, 50000], 
        change:function(event, ui){
         priceVlue.min = ui.values[0]
         priceVlue.max = ui.values[1]
         getProductFilter(categoryValu, priceVlue, orderValue);
        },
        slide: function(event, ui) {
            $("#amount").val("TK" + ui.values[0] + "              Tk" + ui.values[1]);
        },
      });

      $('select[name="shorting"]').change(function(){
  const value = $(this).val();
  orderValue.order = value.split('.')[0]
  orderValue.sort = value.split('.')[1]
  getProductFilter(categoryValu, priceVlue, orderValue);
})
</script>
@endpush

@endsection 
