@extends('layout.frontend')
@section('title', 'Masuk')
@section('content')
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="shopping-cart">
          <div class="cart-ship-info">
            <div class="row">
              <div class="col-sm-12">
                <h6>Masuk Ke Akun Anda</h6>
                <form method="post">
                @csrf
                  <ul class="row">
                    <li class="col-md-12">
                      <label> Username
                        <input type="text" name="username" value="" placeholder="">
                      </label>
                    </li>
                    <li class="col-md-12">
                      <label> Password
                        <input type="password" name="password" value="" placeholder="">
                      </label>
                    </li>
                    <li class="col-md-4">
                      <button type="submit" class="btn">Masuk</button>
                    </li>
                    <li class="col-md-4">
                    </li>
                    <li class="col-md-4">
                      <div class="checkbox margin-0 margin-top-20 text-right">
                        <a href="{{ url('register') }}">Belum Punya Akun? Buat Sekarang</a>
                      </div>
                    </li>
                  </ul>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection