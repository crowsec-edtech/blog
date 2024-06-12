(async () => {
    try {
        const request = await fetch('/api/', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({'action': 'get_comments'})
        });

        const comments = await request.json();

        const commentsDiv = document.getElementById('comments');
        
        for(var comment of comments) {
            commentsDiv.innerHTML += `<div class="flex flex-col justify-center p-4 space-y-2">    
            <div class="flex flex-row items-center">
                <img src="https://media.idownloadblog.com/wp-content/uploads/2017/03/Twitter-new-2017-avatar-001.png" class="h-8 rounded-full">
                <h1 class="leading-6 pl-2 text-sm font-semibold">Anonymous</h1>

                <div class="flex w-full justify-end">
                    <button onclick="delete_comment(${comment.id})" class="mt-2 py-2 px-8 bg-gray-800 hover:bg-gray-600 transition-all text-white">Delete</button>
                </div>
            </div>
            <p class="text-gray-600">${comment.comment}</p>
        </div>`;
        }

    } catch(e) {
        console.error(e);
    } 
})();

async function create_comment(event) {
    event.preventDefault();

    try {
        const comment = document.getElementById('comment').value;

        const request = await fetch('/api/', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({'action': 'create_comment', 'comment': comment})
        });

        if(request.status == 200) {
            window.location.href = '/stored.php';
        }

    } catch(e) {
        console.error(e);
    }
}

async function delete_comment(id) {
    try {
        const request = await fetch('/api/', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({'action': 'delete_comment', 'comment_id': id})
        });

        if(request.status == 200) {
            window.location.href = '/stored.php';
        }
    } catch(e) {
        console.error(e);
    }
}