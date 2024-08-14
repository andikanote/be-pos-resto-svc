@extends('layouts.app')

@section('title', 'Products')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Products</h1>
                <div class="section-header-button">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Products</a></div>
                    <div class="breadcrumb-item">All Products</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Products</h2>
                <p class="section-lead">
                    You can manage all Products, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Products</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('products.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                          <th style="text-align: center;">Image</th>
                                          <th style="text-align: center;">Name</th>
                                          <th style="text-align: center;">Category</th>
                                          <th style="text-align: center;">Price</th>
                                          <th style="text-align: center;">Status</th>
                                          <th style="text-align: center;">Favorite</th>
                                          <th style="text-align: center;">Created at</th>
                                          <th style="text-align: center;">Action</th>
                                        </tr>
                                        @if(count($products) > 0)
                                          @foreach ($products as $product)
                                            <tr>
                                              <td style="display: flex; justify-content: center; align-items: center;">
                                                <a href="{{ asset($product->image) }}" target="_blank" class="image-link">
                                                  <img src="{{ asset($product->image) }}" alt="Category Image" style="width: 50px; height: 50px; border-radius: 10px; object-fit: cover;">
                                                </a>
                                              </td>
                                              <td style="text-align: center;">{{ $product->name }}</td>
                                              <td style="display: flex; justify-content: center; align-items: center;">
                                                <a href="{{ asset($product->category->image) }}" target="_blank" class="image-link">
                                                  <img src="{{ asset($product->category->image) }}" alt="Product Image" style="width: 30px; height: 30px; border-radius: 10px; object-fit: cover;">
                                                </a>
                                                <span style="margin-left: 10px;">{{ $product->category->name }}</span>
                                              </td>
                                              <td style="text-align: center;">Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                                              <td style="text-align: center;">
                                                <span style="{{ $product->status == 1 ? 'color: green; font-weight: bold' : 'color: red; font-weight: bold' }}">{{ $product->status == 1 ? 'Active' : 'Inactive' }}</span>
                                              </td>
                                              <td style="text-align: center;">
                                                <span style="{{ $product->is_favorite == 1 ? 'color: blue; font-weight: bold' : 'color: orange; font-weight: bold' }}">{{ $product->is_favorite == 1 ? 'Yes' : 'No' }}</span>
                                              </td>
                                              <td style="text-align: center;">{{ $product->created_at }}</td>
                                              <td style="text-align: center;">
                                                <div class="d-flex justify-content-center">
                                                  <a href='{{ route('products.edit', $product->id) }}'
                                                    class="btn btn-sm btn-info btn-icon">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                  </a>

                                                  <form action="{{ route('products.destroy', $product->id) }}"
                                                    method="POST" class="ml-2">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <input type="hidden" name="_token"
                                                      value="{{ csrf_token() }}" />
                                                    <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                      <i class="fas fa-times"></i> Delete
                                                    </button>
                                                  </form>
                                                </div>
                                              </td>
                                            </tr>
                                          @endforeach
                                        @else
                                          <tr>
                                            <td colspan="8" style="text-align: center;">Data product kosong</td>
                                          </tr>
                                        @endif
                                      </table>
                                </div>
                                <div class="float-right">
                                    {{ $products->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
