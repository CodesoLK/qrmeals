                    
                    @if($category->parent_id != null)
                   
                        <div class="col-lg-12">
                            
                            <nav class="tabbable ">
                                <ul class="nav nav-pills bg-white mb-2">
                                    <li class="nav-item nav-item-category ">
                                        <a class="nav-link  mb-sm-3 mb-md-0 active" onClick="enterCategory({{ $category->parent_id }}, '{{$categ_id}}')" href="javascript:void(0)"> <i class="fa fa-arrow-left">  </i> BACK </a>
                                    </li> 
                                    <li class="nav-item nav-item-category ">
                                        <p class="display-4" >{{ $category->name }}</p>
                                    </li>                           
                                </ul>
                            </nav>
                        </div>
                   
                    @endif
                    @if(!$category->aitems->isEmpty() && !$category->subcategorys->isEmpty())
                    @foreach ($category->aitems as $item)
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="strip">
                                @if(!empty($item->image))
                                <figure>
                                    <a onClick="setCurrentItem({{ $item->id }})" href="javascript:void(0)"><img src="{{ $item->logom }}" loading="lazy" data-src="{{ config('global.restorant_details_image') }}" class="img-fluid lazy" alt=""></a>
                                </figure>
                                @endif
                                <div class="res_title"><b><a onClick="setCurrentItem({{ $item->id }})" href="javascript:void(0)">{{ $item->name }}</a></b></div>
                                <div class="res_description">{{ $item->short_description}}</div>
                                <div class="row">
                                    <div class="col-4"><div class="res_mimimum">@money($item->price, config('settings.cashier_currency'),config('settings.do_convertion'))</div></div>
                                    <div class="col-8">
                                        <div class="allergens" style="text-align: right;">
                                            @foreach ($item->allergens as $allergen)
                                             <div class='allergen' data-toggle="tooltip" data-placement="bottom" title="{{$allergen->title}}" >
                                                 <img  src="{{$allergen->image_link}}" />
                                             </div>
                                            @endforeach
                                             
                                        </div>
                                    </div>
                                </div>
                                
                                
                           
                            </div>
                        </div>
                @endforeach
                @include('restorants.partials.category', [
                    'categorys' => $category->subcategorys,
                    'section' => $categ_id
                ])
                @else
                <div class="alert alert-warning alert-dismissible fade show col-lg-12" role="alert">
                    <strong>No data!</strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                @endif