<div class="list-group">
    @foreach ($reviews as $review)
            <div id="profile" class="d-flex pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                </svg>
                <p class="px-2">Restauran {{ $review->restaurant_id }}</p>
            </div>
            <div id="review-{{ $review->id }}" class="card mb-3" style="position: relative;">
                <div id="review-text-{{ $review->id }}" class="card-body">
                    <!-- Display star rating -->
                    <div class="mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="{{ $i <= $review->rating ? 'orange' : 'gray' }}" class="bi bi-star-fill mb-3" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                        @endfor
                    </div>
                    <p class="pt-3">{{ $review->review }}</p>
                </div>
            </div>

            <!-- Edit form, hidden by default -->

        @endforeach
    {{-- <div class="list-group-item">
        <h5>Review 1</h5>
        <p>This is a great product! Highly recommended.</p>
    </div>
    <div class="list-group-item">
        <h5>Review 2</h5>
        <p>Not bad, could be better in terms of quality.</p>
    </div>
    <div class="list-group-item">
        <h5>Review 3</h5>
        <p>Excellent service and fast delivery.</p>
    </div>
    <div class="list-group-item">
        <h5>Review 4</h5>
        <p>Product does not match the description. Disappointed.</p>
    </div> --}}
</div>
