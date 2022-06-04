<div id="render-{{$category->id}}">
                        @if($category->active == 1)
                        
                        <div class="alert alert-default">
                            <div class="row">
                                <div class="col">
                                    @if($category->parent_id != null)
                                    <a href="javascript:void(0);" class="shehan" onclick="getCategory({{$category->parent_id}}, {{$category->id}})" class="btn btn-icon btn-1 btn-sm btn-warning" type="button"  >
                                       <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i> BACK</span>
                                    </a>
                                    @endif
                                    <span class="h1 font-weight-bold mb-0 text-white">{{ $category->name }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <script>
                                            function setSelectedCategoryId(id){
                                                $('#category_id').val(id);
                                            }

                                            function setRestaurantId(id){
                                                $('#res_id').val(id);
                                            }

                                        </script>
                                        @if($canAdd)
                                            <button class="btn btn-icon btn-1 btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-new-item" data-toggle="tooltip" data-placement="top" title="{{ __('Add item') }} in {{$category->name}}" onClick=(setSelectedCategoryId({{ $category->id }})) >
                                                <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                                            </button>
                                        @else
                                            <a href="{{ route('plans.current')}}" class="btn btn-icon btn-1 btn-sm btn-warning" type="button"  >
                                                <span class="btn-inner--icon"><i class="fa fa-plus"></i> {{ __('Menu size limit reaced') }}</span>
                                            </a>
                                        @endif
                                        <button class="btn btn-icon btn-1 btn-sm btn-warning" type="button" id="edit" data-toggle="modal" data-target="#modal-edit-category" data-toggle="tooltip" data-placement="top" title="{{ __('Edit category') }} {{ $category->name }}" data-id="<?= $category->id ?>" data-name="<?= $category->name ?>" >
                                            <span class="btn-inner--icon"><i class="fa fa-edit"></i></span>
                                        </button>

                                       

                                        <form action="{{ route('categories.destroy', $category) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-icon btn-1 btn-sm btn-danger" type="button" onclick="confirm('{{ __("Are you sure you want to delete this category?") }}') ? this.parentElement.submit() : ''" data-toggle="tooltip" data-placement="top" title="{{ __('Delete') }} {{$category->name}}">
                                                <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
                                            </button>
                                        </form>

                                       

                                         <!-- UP -->
                                         
                                         

                                        <!-- DOWN -->
                                       

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($category->active == 1)
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="row row-grid">
                                    @foreach ( $category->items as $item)
                                        <div class="col-lg-3">
                                            <a href="{{ route('items.edit', $item) }}">
                                                <div class="card">
                                                    <img class="card-img-top" src="{{ $item->logom }}" alt="...">
                                                    <div class="card-body">
                                                        <h3 class="card-title text-primary text-uppercase">{{ $item->name }}</h3>
                                                        <p class="card-text description mt-3">{{ $item->description }}</p>

                                                        <span class="badge badge-primary badge-pill">@money($item->price, config('settings.cashier_currency'),config('settings.do_convertion'))</span>

                                                        <p class="mt-3 mb-0 text-sm">
                                                            @if($item->available == 1)
                                                            <span class="text-success mr-2">{{ __("AVAILABLE") }}</span>
                                                            @else
                                                            <span class="text-danger mr-2">{{ __("UNAVAILABLE") }}</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <br/>
                                            </a>
                                        </div>
                                    @endforeach
                                    @foreach ( $category->subcategorys as $subcategory)
                                            <div class="col-lg-3">
                                                <a href="#">
                                                    <div class="card">
                                                        <img class="card-img-top" src="{{ asset('/uploads/restorants/subcategorys/') }}/{{ $subcategory->image }}_medium.jpg" alt="...">
                                                        <div class="card-body">
                                                            <h3 class="card-title text-primary text-uppercase">{{ $subcategory->name }}</h3>
                                                            <p class="card-text description mt-3">{{ $subcategory->description }}</p>

                                                        </div>
                                                    </div>
                                                    <br/>
                                                </a>
                                                </div>
                                    @endforeach
                                    @if($canAdd)
                                    <div class="col-lg-3" >
                                        <a   data-toggle="modal" data-target="#modal-new-item" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onclick=(setSelectedCategoryId({{ $category->id }}))>
                                            <div class="card">
                                                <img class="card-img-top" src="{{ asset('images') }}/default/add_new_item.jpg" alt="...">
                                                <div class="card-body">
                                                    <h3 class="card-title text-primary text-uppercase">{{ __('Add item') }}</h3>
                                                </div>
                                            </div>
                                        </a>
                                        <br />
                                    </div>
                                    <div class="col-lg-3" >
                                        <a id="subcategory_add" data-toggle="tooltip" data-placement="top" onclick="return addSubs({{$category->id}})" href="javascript:void(0);" onclick=(setSelectedCategoryId({{ $category->id }}))>
                                            <div class="card">
                                                <img class="card-img-top" src="{{ asset('images') }}/default/add_new_item.jpg" alt="...">
                                                <div class="card-body">
                                                    <h3 class="card-title text-primary text-uppercase">Add sub-category</h3>
                                                </div>
                                            </div>
                                        </a>
                                        <br />
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        </div>