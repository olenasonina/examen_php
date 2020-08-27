<div class="container">
    <div class="row">
        <div class="col-12">
            <form class="my-5" novalidate="" action="{{ route('createAdv') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h5 class="mb-3">Опишите товарную позицию:</h5>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="crop">Наименование зерновой культуры:</label>
                        <select class="custom-select d-block w-100" id="crop" name='crop' required="" value="{{ old('crop') }}">
                            <option value="">Choose...</option>
                            @forelse ($crops as $crop)
                            <option value="{{$crop->id}}">{{$crop->name}}</option>
                            @empty
                            <p>Отсутствуют</p>
                            @endforelse
                        </select>
                        @error('crop')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="image">Добавьте фото:</label>
                        <input type="file" name="image" id="image">
                        @error('image')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="crops_class">Классификация технологического качества (класс):</label>
                        <select class="custom-select d-block w-100" id="crops_class" name='crops_class' required="">
                            <option value="">Choose...</option>

                            @forelse ($crops_classiness as $crops_class)
                            <option value="{{$crops_class->id}}">{{$crops_class->name}}</option>
                            @empty
                            <p>Отсутствуют</p>
                            @endforelse

                        </select>
                        @error('crops_class')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="incoterms">ИНКОТЕРМС (международные правила и условия поставки):</label>
                        <select class="custom-select d-block w-100" id="incoterms" name='incoterms' required="">
                            <option value="">Choose...</option>

                            @forelse ($incoterms as $incoterm)
                            <option value="{{$incoterm->id}}">{{$incoterm->abbr}}</option>
                            @empty
                            <p>Отсутствуют</p>
                            @endforelse

                        </select>
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="districts">Район:</label>
                        <select class="custom-select d-block w-100" id="districts" name='districts' required="">
                            <option value="">Choose...</option>

                            @forelse ($locations as $location)
                            <option value="{{$location->id}}">{{$location->regions_name}} область {{$location->name}} район </option>
                            @empty
                            <p>Отсутствуют</p>
                            @endforelse

                        </select>
                        @error('districts')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="pickup">Хранение зерна (текущее состояние сбора):</label>
                        <select class="custom-select d-block w-100" id="pickup" name='pickup' required="">
                            <option value="">Choose...</option>

                            @forelse ($pickup as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @empty
                            <p>Отсутствуют</p>
                            @endforelse

                        </select>
                        @error('pickup')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="price">Цена:</label>
                        <input type="text" class="form-control" id="price" name='price' placeholder="" required="">
                        @error('price')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <label for="unit">Единица измерения:</label>
                        <select class="custom-select d-block w-100" id="unit" name='unit' required="">
                            <option value="">Choose...</option>

                            @forelse ($units as $unit)
                            <option value="{{$unit}}">{{$unit}}</option>
                            @empty
                            <p>Отсутствуют</p>
                            @endforelse

                        </select>
                        @error('unit')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="cropdescription">Описание: </label>
                        <textarea class="form-control" id="cropdescription" rows="8" name='cropdescription'></textarea>
                        @error('cropdescription')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                </div>

                <h5 class="mb-3">Немного о себе</h5>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="seller_types">Ваш статус, как продавца</label>
                        <select class="custom-select d-block w-100" id="seller_types" name='seller_types' required="">
                            <option value="">Choose...</option>

                            @forelse ($seller_types as $seller_type)
                            <option value="{{$seller_type->id}}">{{$seller_type->name}}</option>
                            @empty
                            <p>Отсутствуют</p>
                            @endforelse

                        </select>
                        @error('seller_types')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="company_web">Company's Website URL</label>
                        <input type="text" class="form-control" id="company_web" name='c_web' placeholder="" required="">
                        @error('c_web')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone">Контактный телефон:</label>
                        <input type="text" class="form-control" id="phone" name='phone' placeholder="" required="">
                        @error('phone')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="payment_methods">Допустимый метод оплаты</label>
                        <select class="custom-select d-block w-100" id="payment_methods" name='payment_methods' required="">
                            <option value="">Choose...</option>

                            @forelse ($payment_methods as $payment_method)
                            <option value="{{$payment_method->id}}">{{$payment_method->name}}</option>
                            @empty
                            <p>Отсутствуют</p>
                            @endforelse

                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="payment_forms">Допустимая форма оплаты</label>
                        <select class="custom-select d-block w-100" id="payment_forms" name='payment_forms' required="">
                            <option value="">Choose...</option>

                            @forelse ($payment_forms as $payment_form)
                            <option value="{{$payment_form->id}}">{{$payment_form->name}}</option>
                            @empty
                            <p>Отсутствуют</p>
                            @endforelse

                        </select>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block col-md-3" type="submit">Continue</button>
            </form>
        </div>
    </div>
</div>