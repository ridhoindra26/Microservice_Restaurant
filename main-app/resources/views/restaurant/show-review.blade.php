@extends('restaurant.layouts.show')

@section('body')

<div class="container my-5">

    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex mb-4">
        <h3>Comments ({{ $countReviews }})</h3>
    </div>

    <div id="reviews-container" class="mb-5">
        @foreach ($reviews as $review)
            <div id="profile" class="d-flex pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
                <p class="px-2">{{ $review->username }}</p>
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
                    <div class="dropdown" style="position: absolute; top: 10px; right: 10px;">
                        <button class="btn dropdown-toggle no-caret" type="button" id="dropdownMenuButton-{{ $review->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                            &#x22ee;
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $review->id }}">
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="showEditForm({{ $review->id }})">Edit</a></li>
                            <li>
                                <form action="/delete-review/{{ $review->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Edit form, hidden by default -->
            <div id="edit-form-{{ $review->id }}" style="display: none;">
                <form action="/update-review/{{ $review->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="newReview">New Review</label>
                        <textarea name="newReview" class="form-control" rows="4" required>{{ $review->review }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="newRating">New Rating</label>
                        <div class="rating" id="edit-rating-{{ $review->id }}">
                            <span class="star" onclick="updateRating({{ $review->id }}, 1)">&#9733;</span>
                            <span class="star" onclick="updateRating({{ $review->id }}, 2)">&#9733;</span>
                            <span class="star" onclick="updateRating({{ $review->id }}, 3)">&#9733;</span>
                            <span class="star" onclick="updateRating({{ $review->id }}, 4)">&#9733;</span>
                            <span class="star" onclick="updateRating({{ $review->id }}, 5)">&#9733;</span>
                        </div>
                        <input type="hidden" name="newRating" id="edit-rating-value-{{ $review->id }}" value="{{ $review->rating }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" onclick="hideEditForm({{ $review->id }})">Cancel</button>
                </form>
            </div>

        @endforeach
    </div>

    <div class="text-center mb-5">
        <button class="btn btn-primary mb-3" id="addReviewBtn" onclick="showReviewForm()">Add Review</button>
    </div>

    <div id="reviewForm" class="card" style="display: none;">
        <div class="card-header">
            <h5 class="card-title">Add a Review</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $resto->id }}" name="restaurant_id" id="restaurant_id">
                <input type="hidden" value="{{ $user->id }}" name="user_id" id="user_id">
                <div class="form-group mb-3">
                    <label for="review">Review:</label>
                    <textarea id="review" name="review" class="form-control" rows="4" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="rating">Rating:</label>
                    <div id="rating" class="star-rating">
                        <input type="hidden" name="rating" id="rating-value" required>
                        <span class="star" data-value="1">&#9733;</span>
                        <span class="star" data-value="2">&#9733;</span>
                        <span class="star" data-value="3">&#9733;</span>
                        <span class="star" data-value="4">&#9733;</span>
                        <span class="star" data-value="5">&#9733;</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit Review</button>
                <button type="button" class="btn btn-secondary" onclick="hideReviewForm()">Cancel</button>
            </form>
        </div>
    </div>
</div>

<style>
    .dropdown-toggle::after {
        display: none;
    }

    .no-caret::after {
        display: none;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }

    .card-title {
        margin-bottom: 0;
    }

    .star-rating {
        display: flex;
        gap: 5px;
        cursor: pointer;
    }

    .star {
        font-size: 24px;
        color: #ccc;
        transition: color 0.2s;
    }

    .star.selected,
    .star:hover,
    .star:hover ~ .star {
        color: #eab106;
    }

    .rating {
        unicode-bidi: bidi-override;
        /* direction: rtl; */
    }

    .star {
        cursor: pointer;
        font-size: 30px;
        color: #d3d3d3;
    }

    .star.active {
        color: #FFD700;
    }

</style>

<script>
    function showEditForm(reviewId) {
        document.getElementById('review-text-' + reviewId).style.display = 'none';
        document.getElementById('edit-form-' + reviewId).style.display = 'block';
    }

    function hideEditForm(reviewId) {
        document.getElementById('edit-form-' + reviewId).style.display = 'none';
        document.getElementById('review-text-' + reviewId).style.display = 'block';
    }

    function showReviewForm() {
        document.getElementById('reviewForm').style.display = 'block';
        document.getElementById('addReviewBtn').style.display = 'none';
    }

    function hideReviewForm() {
        document.getElementById('reviewForm').style.display = 'none';
        document.getElementById('addReviewBtn').style.display = 'block';
    }

    function updateRating(reviewId, rating) {
        const stars = document.querySelectorAll('#edit-rating-' + reviewId + ' .star');
        const ratingInput = document.getElementById('edit-rating-value-' + reviewId);

        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });

        ratingInput.value = rating;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-rating .star');
        stars.forEach(star => {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                document.getElementById('rating-value').value = value;
                stars.forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
                let previousSibling = this.previousElementSibling;
                while (previousSibling) {
                    previousSibling.classList.add('selected');
                    previousSibling = previousSibling.previousElementSibling;
                }
                let nextSibling = this.nextElementSibling;
                while (nextSibling) {
                    nextSibling.classList.remove('selected');
                    nextSibling = nextSibling.nextElementSibling;
                }
            });
        });
    });
</script>

@endsection
