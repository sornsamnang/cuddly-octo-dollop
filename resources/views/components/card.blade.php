@props(["card"])

<div class="card card-row bg-2 p-2 position-relative">
  <div 
    class="swiper mySwiper z-0" 
    style="max-width: 150px; min-width: 150px; height: 240px;"
  > 
    <div class="swiper-wrapper">
      @foreach($card->images as $image)
        <div class="swiper-slide bg-3 rounded-4">
          <img src="{{ url($image->path_name) }}"
            class="w-100 h-100 object-fit-contain" 
            alt=""
          >
        </div>
      @endforeach
    </div>
    <div class="swiper-pagination"></div>
  </div>

  <div class="card-body p-3">
    <h4 class="card-title">{{ $card->title }}</h4>
    <p class="card-text text-clamp-6">{{ $card->description }}</p>
    <p class="card-text">
      <small class="fg-2">
        <script>
          document.write(
            moment.utc("{{$card->created_at}}")
              .fromNow()
              .replace(/(^an)|(^a)/, "1")
          );
        </script>
      </small>
    </p>
  </div>

  <button 
    type="button"
    class="btn-icon rounded-circle position-absolute top-3 end-0 me-3"
    data-bs-toggle="menu" 
    aria-expanded="false"
    data-bs-placement="bottom lg:left"
  >
    <i class="bi bi-three-dots-vertical"></i>
  </button>
  <div class="menu bg-2">
    <a 
      href="{{ route("card.edit", $card->id) }}"
      class="menu-item btn-lg">
      <i class="bi bi-pencil"></i>
      Edit
    </a>
    <a
      href="{{ route("card.destroy", $card->id) }}"
      class="menu-item theme-danger"
      onclick="return confirm('Are you sure you want to delete?')"
    >
      <i class="bi bi-trash"></i>
      Delete
    </a>
  </div>
</div>