import React, { useState, useEffect } from 'react';
import './Reviews.css';

const Reviews = ({ target, touristId }) => {
    const token = localStorage.getItem('token');
    const userRole = localStorage.getItem('role');
    const isAdmin = userRole === 'admin';
    const isTourist = userRole === 'tourist';
    const [formData, setFormData] = useState({ rating: 0, comment: '' });
    const [reviews, setReviews] = useState([]);
    const [message, setMessage] = useState('');
    const [hoverRating, setHoverRating] = useState(0);

    useEffect(() => {
        if (token) {
            fetchReviews();
        }
    }, [target, token]);

    const fetchReviews = async () => {
        try {
            const response = await fetch(`${process.env.REACT_APP_API_URL}/user/${target}`, {
                headers: { Authorization: `Bearer ${token}` }
            });
            const result = await response.json();
            if (response.ok) {
                setReviews(result.reviews);
            } else {
                setMessage(result.message || 'Failed to load reviews');
            }
        } catch (error) {
            setMessage('Network error occurred');
            console.error('Error: ', error);
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (!formData.rating) {
            setMessage('Please provide a rating.');
            return;
        }
        try {
            const reviewData = {
                tourist_id: touristId,
                user_id: target,
                rating: formData.rating,
                comment: formData.comment
            };
            const response = await fetch(`${process.env.REACT_APP_API_URL}/reviews`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(reviewData)
            });
            const result = await response.json();
            if (response.ok) {
                setMessage(result.message);
                setFormData({ rating: 0, comment: '' });
                setHoverRating(0);
                fetchReviews();
            } else {
                setMessage(`${result.message}: ${JSON.stringify(result.errors || result.error)}`);
            }
        } catch (error) {
            setMessage('Network error occurred');
            console.error('Error: ', error);
        }
    };

    const handleDelete = async (reviewId) => {
        try {
            const response = await fetch(`${process.env.REACT_APP_API_URL}/reviews/${reviewId}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            });
            const result = await response.json();
            if (response.ok) {
                setMessage('Review deleted successfully');
                fetchReviews();
            } else {
                setMessage(result.message || 'Failed to delete review');
            }
        } catch (error) {
            setMessage('Network error occurred');
            console.error('Error: ', error);
        }
    };

    const handleStarClick = (rating) => {
        setFormData({ ...formData, rating });
    };

    const handleStarHover = (rating) => {
        setHoverRating(rating);
    };

    const renderStars = (rating, interactive = false) => {
        const stars = [];
        for (let i = 1; i <= 5; i++) {
            stars.push(
                <i
                    key={i}
                    className={`fas fa-star ${i <= (interactive ? hoverRating || formData.rating : rating) ? 'star-filled' : 'star-empty'}`}
                    onClick={interactive ? () => handleStarClick(i) : null}
                    onMouseEnter={interactive ? () => handleStarHover(i) : null}
                    onMouseLeave={interactive ? () => handleStarHover(formData.rating) : null}
                    style={interactive ? { cursor: 'pointer' } : {}}
                ></i>
            );
        }
        return stars;
    };

    if (!token) {
        return <div className="notice">Please log in to see reviews.</div>;
    }

    return (
        <div className="reviews-container max-w-4xl mx-auto p-4 sm:p-6 bg-[#002343] rounded-lg shadow-lg">
            {isTourist && (
                <>
                    <h2 className="text-2xl font-bold text-white mb-4">Submit a Review</h2>
                    <form onSubmit={handleSubmit} className="review-form-container bg-white p-4 sm:p-6 rounded-lg mb-6 border border-[#e0e6ef]">
                        <div className="mb-4">
                            <b className="block text-[#002343] mb-2 font-semibold">Rating:</b>
                            <div className="flex space-x-1">{renderStars(formData.rating, true)}</div>
                        </div>
                        <div className="mb-4">
                            <label className="block text-[#002343] mb-2 font-semibold">Comment (optional):</label>
                            <textarea
                                name="comment"
                                value={formData.comment}
                                onChange={(e) => setFormData({ ...formData, comment: e.target.value })}
                                className="review-form-textarea w-full p-2 rounded bg-[#f5f7fa] text-[#002343] border border-[#e0e6ef] focus:outline-none focus:ring-2 focus:ring-[#002343]"
                                rows="4"
                            ></textarea>
                        </div>
                        <button type="submit" className="review-form-button bg-[#002343] hover:bg-[#012946] text-white p-2 rounded w-full sm:w-auto">
                            Submit Review
                        </button>
                    </form>
                </>
            )}
            {message && <div className="mt-4 text-[#002343] text-center">{message}</div>}
            <h2 className="text-2xl font-bold text-white mt-8 mb-4">Reviews</h2>
            <div className="reviews-list">
                {reviews.length > 0 ? (
                    reviews.map(review => (
                        <div key={review.id} className="review-item bg-white p-4 rounded-lg mb-4 border border-[#e0e6ef]">
                            <p className="text-[#002343]"><strong>Reviewer:</strong> {review.tourist?.full_name || 'Anonymous'}</p>
                            <p className="text-[#002343]"><strong>Rating:</strong> <span className="inline-flex ml-2">{renderStars(review.rating)}</span></p>
                            <p className="text-[#002343]"><strong>Comment:</strong> {review.comment || 'No comment'}</p>
                            <p className="text-[#002343]"><strong>Date:</strong> {new Date(review.created_at).toLocaleDateString()}</p>
                            {isAdmin && (
                                <button
                                    onClick={() => handleDelete(review.review_id)}
                                    className="delete-form-button"
                                >
                                    Delete Review
                                </button>
                            )}
                        </div>
                    ))
                ) : (
                    <p className="text-[#002343]">No reviews yet.</p>
                )}
            </div>
        </div>
    );
};

export default Reviews;