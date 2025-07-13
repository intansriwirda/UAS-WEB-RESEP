@if ($carouselRecipes->count())
<section class="bg-cream py-5">
  <div class="container">
    <h4 class="fw-bold text-center mb-5">
    <i class="bi bi-fire me-2 text-warning"></i>Our Newest Recipes
    </h4>


    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner rounded-4 shadow-lg overflow-hidden">

        @foreach ($carouselRecipes as $index => $recipe)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
          <a href="{{ route('recipes.show', $recipe->id) }}">
            <div class="position-relative">
              <img src="{{ asset('storage/' . $recipe->image) }}"
                class="d-block w-100"
                style="height: 400px; object-fit: cover; filter: brightness(80%);"
                alt="{{ $recipe->title }}">

              <!-- Caption Tengah -->
              <div class="position-absolute top-50 start-50 translate-middle text-center px-4">
                <h5 class="text-white fw-bold fs-2">
                  <i class="bi bi-journal-bookmark-fill me-2 text-light"></i>{{ $recipe->title }}
                </h5>
                <p class="text-white-50 small">
                  {{ Str::limit($recipe->description, 100) }}
                </p>
              </div>
            </div>
          </a>
        </div>
        @endforeach

      </div>

      <!-- Navigasi -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark bg-opacity-50 rounded-circle p-2"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark bg-opacity-50 rounded-circle p-2"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>
@endif
