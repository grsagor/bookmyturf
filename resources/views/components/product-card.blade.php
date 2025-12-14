<div {{ $attributes->merge(['class' => 'card h-100 shadow-sm rounded overflow-hidden']) }}>
  <img src="{{ $image }}" class="card-img-top" alt="{{ $title }}">
  <div class="card-body d-flex flex-column">
    <h5 class="card-title fw-semibold">{{ $title }}</h5>
    <p class="card-text flex-grow-1 text-muted" style="min-height: 4.5rem;">{{ $description }}</p>
    @if(isset($url))
      <a href="{{ $url }}" class="btn btn-primary mt-auto w-100">View Details</a>
    @endif
  </div>
</div>
