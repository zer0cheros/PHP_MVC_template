async function handleRole(userId) {
    const newRole = prompt("Enter new role (e.g., 'admin', 'user'):");
    if (!newRole) return;

    fetch('/user/updateRole', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ user_id: userId, new_role: newRole })
    })
    .then(res =>  res.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.error || 'Failed to update role');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Something went wrong. Check console.');
    });
}