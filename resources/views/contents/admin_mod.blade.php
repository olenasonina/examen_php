<div class='col-8 my-5 mx-auto'>
   <h5 class="my-5">{{$param}}:</h5>
   <div>
   @forelse ($advs as $adv)
      <div class="card mb-3" style="width: 100%;">
         <div class="row no-gutters">
            <div class="col-md-4">
               <img src="../uploads/adv_images/{{$adv->image}}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
               <div class="card-body">
                  <h5 class="card-title">{{$adv->crop_name}}</h5>
                  <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$adv->description}}</p>
                  <p class="card-text text-right">Цена за тонну: {{$adv->price}} грн</p>
                  <p class="card-text"><small class="text-muted">{{$adv->updated_at}}</small></p>
                  <a href="{{ route('showAdv', $adv->id) }}" class="btn btn-primary">Перейти к объявлению</a>
               </div>
            </div>
         </div>
      </div>
      @empty
      <p>Объявления отсутствуют</p>
      @endforelse
   </div>
</div>