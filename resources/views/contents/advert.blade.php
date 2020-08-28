<div class="container">
    <div class="row">

        @forelse ($adv as $item)
        <div class="col-lg-8 mx-auto my-5">
            <h5 class="mb-3">Объявление № {{ $item->id }}</h5>
            <div class="d-flex justify-content-between my-3">
                <div class="card mr-2" style="min-width:45%">
                    <img src="../uploads/adv_images/{{$item->image}}" class="card-img" alt="...">
                </div>
                <div class="card ml-2" style="min-width:45%">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Пользователь: {{$item->user_name}}</h5>
                        <h6 class="card-title my-4">Статус продавца: {{$item->seller_type_name}}</h6>
                        <h6 class="card-title my-4">Website компании: {{$item->web}}</h6>
                        <h6 class="card-title my-4">Контактный телефон: {{$item->telephon}}</h6>
                        <h6 class="card-title my-4">Допустимый метод оплаты: {{$item->pay_method_name}}</h6>
                        <h6 class="card-title my-4">Допустимая форма оплаты: {{$item->pay_form_name}}</h6>
                        @if(Auth::id()==1)
                        
                        <form action="{{ route('changeStatus', $item->id)}}" method="GET" class="py-4">
                            @csrf
                            <label for="status">Изменение статуса сообщения:</label>
                            <select class="my-3" name="status" id="status">
                                <option value="">Choose...</option>

                                @forelse ($statuses as $status)
                                <option value="{{$status->id}}">{{$status->name}}</option>
                                @empty
                                <p>Статусы отсутствуют</p>
                                @endforelse
                            </select>
                            <button type="submit" class="btn btn-primary">Изменить статус сообщения</button>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
            <div class="card" style="width:100% mx-0">
                <div class="card-body">
                    <h3 class="card-title mb-4">{{$item->crop_name}}</h3>
                    <h4 class="card-title mb-4">{{$item->price}} за тонну</h4>
                    <h6 class="card-title my-4">Категория: {{$item->category_name}}</h6>
                    <h6 class="card-title my-4">Классификация технологического качества (класс): {{$item->crops_class_name}}</h6>
                    <h6 class="card-title my-4">ИНКОТЕРМС (международные правила и условия поставки): {{$item->incoterm_name}}</h6>
                    <h6 class="card-title my-4">Район: {{$item->district_name}}</h6>
                    <h6 class="card-title my-4">Область: {{$item->location_region_name}}</h6>
                    <h6 class="card-title my-4">Хранение зерна (текущее состояние сбора): {{$item->pickup_name}}</h6>
                    <h6 class="card-title my-4">Описание: {{$item->description}}</h6>
                    <p class="card-text"><small class="text-muted">Last updated: {{$item->updated_at}}</small></p>
                </div>
            </div>
        </div>
        @empty
        <p>Объявление отсутствует</p>
        @endforelse
    </div>
</div>