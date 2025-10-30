<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Ecobazar- @yield('title','Homepage') </title>
<!-- ===================== Google Fonts Start ============================= -->
  @include('include.frontend-css')
<!-- ===================== ALL Css Start ============================= -->
</head>
<body>
    
<header>
<!-- =============== Top Bar Start ================== -->
<nav class="navbar navbar-expand-lg aling-items-center" style="background-color: rgb(245, 239, 239);">
  <div class="container">
    <a href="{{ route('home') }}">
      <img src="{{ asset('frontend/assets/image/Logo.svg') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex mx-auto search" action="#" method="GET" role="search">
        <div class="col-lg-12">
           <div class="btn-group searchValue">
             <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search"/>
             <button class="btn btn-outline-success" type="submit">Search</button>
           </div>
           <div class="d-flex position-absolute bg-light shadow w-25 d-none mt-1 searchResult" style="z-index:99999">
            <ul>
            <li><a href="#">Gold</a></li>
            </ul>
           </div>
           </div>
        </div>
      </form>
      <ul class="d-flex button-icon">
        <li><a href="{{ route('customer.login') }}"><button><i class="fa-solid fa-user"></i></button></a></li>
        <span>|</span>
        <li>
            <a href="{{ route('cart.index') }}"><button><i class="fa-solid fa-shopping-bag"></i></button></a>
            <span>{{ $cart }}</span>
        </li>
      </ul>

    </div>
  </div>
</nav>
<!-- =============== Top Bar End ================== -->
<!-- =============== Nav Bar Start ================== -->
<nav class="navbar navbar-expand-lg" style="background-color: rgba(30, 31, 30, 1);">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

      @foreach ($categories as $category)
        <li class="nav-item dropdown">
          <a class="nav-link {{ count($category->subcategories) > 0 ? 'dropdown-toggle':''}}" href="#">
           {{ $category->title }}
          </a>
          @if (count($category->subcategories) > 0)
          <ul class="dropdown-menu">
            @foreach ($category->subcategories as $subcategory)
            <li><a class="dropdown-item text-dark" href="{{ route('frontend.product',$subcategory->slug) }}">{{ $subcategory->title }}</a></li>
            @endforeach
          </ul>
          @endif
        </li>
      @endforeach

      </ul>
    </div>
  </div>
</nav>
</header>

<main>
   
@yield('content')

</main>

<!-- ========== Footer Start ==================== -->
<footer id="footer" class="mt-3">
   <div class="container">
    <div class="row">
       <div class="col-lg-3">
        <img src="assets/image/Logo.svg" alt="" class="img-fluid">   
        <p>Morbi cursus porttitor enim lobortis molestie. Duis gravida turpis dui, eget bibendum magna congue nec.</p> 
       </div>
       <div class="col-lg-2">
            <h5 class="mb-2">My Account</h5>
             <li><a href="#">My Account</a></li>
            <li><a href="#">Order History</a></li>
            <li><a href="#">Shoping Cart</a></li>
            <li><a href="#">Wishlist</a></li>
       </div>
        <div class="col-lg-2">
            <h5 class="mb-2">Helps</h5>
             <li><a href="#">Contact</a></li>
            <li><a href="#">Paqs</a></li>
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy Policy</a></li>
       </div>
        <div class="col-lg-2">
            <h5 class="mb-2">Proxy</h5>
             <li><a href="#">About</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">Track Order</a></li>
       </div>
         <div class="col-lg-3">
          <h5 class="mb-2">News Letter</h5>
          <p>Authoritatively morph 24/7 potentialities with error-free partnerships.</p>
          <form action="">
            <div class="btn-group subscribe mt-1">
                <input type="search" name="" id="" placeholder="Enter Your Email">
                <button type="submit">Subscribe</button>
            </div>
          </form>
       </div>
    </div>
   </div>
</footer>
<!-- ========== Footer End ==================== -->

<!-- ===================== ALL Js Src Start ============================= -->
   @include('include.frontend-js')


    <script>



     $('.searchValue input').keyup(function() {
        const searchValue = $(this).val()
        if(searchValue.length >= 3){

          $.ajax({
            url:"{{ route('search.frontend') }}",
            method:'GET',
            data:{
              search: searchValue
            },
            success:function(res){
              if(res.length > 0){
                let serItem = [] 
                let url = "{{ route('frontend.product.sidbar','::slug') }}"
                url.replace('::slug',product.slug)
                res.map(product => {
                  let ProductHtml = `
                   <li><a class="text-dark" href="${url} ">${product.title}</a></li>
                  `
                  serItem.push(ProductHtml)
                })
                $('.searchResult ui').html(searchValue)
              }else{
                 $('.searchResult ui').html('No Product Found!!')
              }

            },
            error:function(){
              console.log(error)
            }
          })

          $('.searchResult').slideDown()
        }else{
          $('.searchResult').hide()
        }
    });


    </script>





   @stack('scripts')
<!-- ===================== ALL Js Src End ============================= -->
</body>
</html>