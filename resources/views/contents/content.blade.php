<div class='col-8 my-5'>
   <h5>Опубликованные объявления:</h5>
   <div>
   @forelse ($advs as $adv)
      <div class="card mb-3" style="width: 100%;">
         <div class="row no-gutters">
            <div class="col-md-4">
               <img src="..." class="card-img" alt="...">
            </div>
            <div class="col-md-8">
               <div class="card-body">
                  <h5 class="card-title">{{$adv->id}}</h5>
                  <p class="card-text">{{$adv->description}}</p>
                  <p class="card-text"><small class="text-muted">{{$adv->updated_at}}</small></p>
               </div>
            </div>
         </div>
      </div>
      @empty
      <p>Объявления отсутствуют</p>
      @endforelse
   </div>
   <!-- <div class="card-deck flex-row flex-wrap pt-2">
      @forelse ($advs as $adv)
      <div class="card mb-3" style="min-width: 25%; max-width:30%">
         <img src="..." class="card-img-top" alt="...">
         <div class="card-body">
            <h5 class="card-title">{{$adv->id}}</h5>
            <p class="card-text">{{$adv->description}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
         </div>
      </div>
      @empty
      <p>Объявления отсутствуют</p>
      @endforelse
   </div> -->
</div>