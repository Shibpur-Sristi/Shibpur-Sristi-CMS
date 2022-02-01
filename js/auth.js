const logout = document.querySelector('#logout');
logout.addEventListener('click', (e) => {
    e.preventDefault();
    console.log()
    auth.signOut().then(() => {
        // console.log('user signed out');
    })
});