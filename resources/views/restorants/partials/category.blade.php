                        @foreach($categorys as $category)
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="strip">
                                @if(!empty($category->image))
                                <figure>
                                    <a onClick="enterCategory({{ $category->id }}, '{{$section}}')" href="javascript:void(0)"><img src="{{ asset('/uploads/restorants/subcategorys/') }}/{{ $category->image }}_medium.jpg" loading="lazy" data-src="{{ config('global.restorant_details_image') }}" class="img-fluid lazy" alt=""></a>
                                </figure>
                                @endif
                                <div class="res_title"><b><a onClick="enterCategory({{ $category->id }}, '{{$section}}')" href="javascript:void(0)">{{ $category->name }}</a></b></div>
                                <div class="res_description">{{ $category->description}}</div>
                            </div>
                        </div>     
                        @endforeach     