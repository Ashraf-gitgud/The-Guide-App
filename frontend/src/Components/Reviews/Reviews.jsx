import React, { useState, useEffect } from 'react';
import './Reviews.css';

const Reviews = ({ target, touristId }) => {
    const token = localStorage.getItem('token');
    const userRole = localStorage.getItem('role'); // Assuming role is stored in localStorage
    const isAdmin = userRole === 'admin';
    const [formData, setFormData] = useState({ rating: '', comment: '' });
    const [reviews, setReviews] = useState([]);
    const [message, setMessage] = useState('');

    useEffect(() => {
        if (token) {
            fetchReviews();
        }
    }, [target, token]);

    const fetchReviews = async () => {
        try {
            const response = await fetch(`http://127.0.0.1:8000/api/reviews/user/${target}`, {
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
            const response = await fetch('http://127.0.0.1:8000/api/reviews', {
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
                setFormData({ rating: '', comment: '' });
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
            const response = await fetch(`http://127.0.0.1:8000/api/reviews/${reviewId}`, {
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

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    if (!token) {
        return <div className="text-center text-white">Please log in to see reviews.</div>;
    }

    return (
        <div className="reviews-container">
            {!isAdmin && (
                <>
                    <h2 className="text-2xl font-bold text-white mb-4">Submit a Review</h2>
                    <form onSubmit={handleSubmit} className="review-form">
                        <div className="mb-4">
                            <label htmlFor="rating" className="block text-white">Rating (1-5): </label>
                            <input
                                type="number"
                                name="rating"
                                value={formData.rating}
                                onChange={handleChange}
                                min="1"
                                max="5"
                                required
                                className="w-full p-2 rounded bg-gray-800 text-white border border-gray-600"
                            />
                        </div>
                        <div className="mb-4">
                            <label htmlFor="comment" className="block text-white">Comment (optional): </label>
                            <textarea
                                name="comment"
                                value={formData.comment}
                                onChange={handleChange}
                                className="w-full p-2 rounded bg-gray-800 text-white border border-gray-600"
                            ></textarea>
                        </div>
                        <button type="submit" className="bg-blue-900 hover:bg-blue-800 text-white p-2 rounded">
                            Submit Review
                        </button>
                    </form>
                </>
            )}
            {message && <div className="mt-4 text-white">{message}</div>}
            <h2 className="text-2xl font-bold text-white mt-8 mb-4">Reviews</h2>
            <div className="reviews-list">
                {reviews.length > 0 ? (
                    reviews.map(review => (
                        <div key={review.id} className="review-item">
                            <p><strong>Reviewer: </strong> {review.tourist?.full_name || 'Anonymous'}</p>
                            <p><strong>Rating: </strong> {review.rating}/5</p>
                            <p><strong>Comment: </strong> {review.comment || 'No comment'}</p>
                            <p><strong>Date: </strong> {new Date(review.created_at).toLocaleDateString()}</p>
                            {isAdmin && (
                                <button
                                    onClick={() => handleDelete(review.review_id)}
                                    className="bg-red-600 hover:bg-red-500 text-white p-2 rounded mt-2"
                                >
                                    Delete Review
                                </button>
                            )}
                        </div>
                    ))
                ) : (
                    <p className="text-white">No reviews yet.</p>
                )}
            </div>
        </div>
    );
};

export default Reviews;