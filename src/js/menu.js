document.addEventListener("DOMContentLoaded", function(event) {
    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            // Initially show navbar
            nav.classList.add('show')
            toggle.classList.add('bx-x')
            bodypd.classList.add('body-pd')
            headerpd.classList.add('body-pd')

            toggle.addEventListener('click', () => {
                // Toggle navbar
                nav.classList.toggle('show')
                // Change icon
                toggle.classList.toggle('bx-x')
                // Add/remove padding to body
                bodypd.classList.toggle('body-pd')
                // Add/remove padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink))
});
    
 