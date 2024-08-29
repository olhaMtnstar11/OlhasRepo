let page = 2;
const loadingIndicator = document.getElementById('loading');
const contentContainer = document.getElementById('content-vehicle');
let hasMorePosts = true; // Flag to indicate if there are more posts

function loadMoreContent() {
    if (loadingIndicator.style.display === 'block' || !hasMorePosts) return; // Prevent multiple requests and if no more posts

    loadingIndicator.style.display = 'block';
    fetch(`/wp-admin/admin-ajax.php?action=load_more_vehicles&page=${page}&filter=${getUrlParameter('vehicles_filter')}`)
        .then(response => response.json())
        .then(data => {
            if (data.content) {
                contentContainer.insertAdjacentHTML('beforeend', data.content);
                page++;
            } else {
                // No more posts
                hasMorePosts = false;
                // Optionally show a message
                contentContainer.insertAdjacentHTML('beforeend', '<p>No more posts to load.</p>');
            }
            loadingIndicator.style.display = 'none';
        })
        .catch(error => {
            console.error('Error loading more content:', error);
            loadingIndicator.style.display = 'none';
        });
}

function getUrlParameter(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name) || '';
}

window.addEventListener('scroll', function() {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100) {
        loadMoreContent();
    }
});
