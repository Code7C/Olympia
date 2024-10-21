function likePlan(event, planId) {
    event.preventDefault(); 

    fetch('/PHP/like.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `like_id=${planId}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`like-count-${planId}`).innerText = `${data.like_count} likes`;
        } else {
            console.error('Error al actualizar el like:', data.message);
        }
    })
    .catch(error => {
        console.error('Error en la solicitud AJAX:', error);
    });
}
