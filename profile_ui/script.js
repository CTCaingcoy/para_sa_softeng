// Function to show User Info
function showUserInfo() {
    document.getElementById("content-container").innerHTML = `<div class="user-info">
                <div class="profile-container">
                    <div class="profile-pic">
                        <img src="bg.png" alt="Profile Picture">
                    </div>
                    <h2>NAME, SURNAME</h2>
                </div>
                <div class="user-details">
                    <label for="email">EMAIL</label>
                    <input type="text" id="email" placeholder="Enter your email">
                    
                    <label for="address">SHIPPING ADDRESS</label>
                    <input type="text" id="address" placeholder="Enter your shipping address">
                    
                    <label for="contact">CONTACT NUMBER</label>
                    <input type="text" id="contact" placeholder="Enter your contact number">
                    <button>save</button>
                </div>
            </div>`;
}

// Function to show Orders
function showOrders() {
    document.getElementById("content-container").innerHTML = ` 
    <div id="order-content" class="order-info">
        <div class="order-track">
            <label>TRACK YOUR ORDER</label>
                <div class="progress-track">
                    <span class="progress-step done"></span>
                    <span class="progress-step done"></span>
                    <span class="progress-step done"></span>
                    <span class="progress-step done"></span>
                </div>
            </div>
                <div class="order-history">
                    <label>ORDER HISTORY</label>
                <div class="order-history-box">
                <!-- This is where order history data will be displayed -->
            </div>
        </div>
    </div>

        `;
}

// Function to show Wishlist
function showWishlist() {
    document.getElementById("content-container").innerHTML = `<div id="wishlist-content" class="wishlist-info">
    <div class="wishlist-header">
        <label>WISHLIST</label>
    </div>
    <div class="wishlist-box">
        <!-- Wishlist items will go here -->
    </div>
</div>

        
        `;
}

// Function to show Contact Info
function showContact() {
    document.getElementById("content-container").innerHTML = `<div id="contact-content" class="contact-info">
    <div class="contact-header">
        <label>GET IN TOUCH</label>
    </div>
    <div class="contact-body">
        <div class="contact-left">
            <p>Whether you've got a question, need advice, or want to discuss a project or collaboration, I'm always open to new connections. Use the form below to reach me, and I'll make sure to respond as soon as I can.</p>
            <div class="contact-icons">
                <img src="phone-icon.png" alt="Phone Icon">
                <img src="facebook-icon.png" alt="Facebook Icon">
            </div>
        </div>
        <div class="contact-form">
            <form>
                <label for="name">NAME *</label>
                <input type="text" id="name" placeholder="Enter your name">
                
                <label for="email">EMAIL *</label>
                <input type="email" id="email" placeholder="Enter your email">
                
                <label for="reason">REASON *</label>
                <input type="text" id="reason" placeholder="Enter the reason">
                
                <label for="message">MESSAGE *</label>
                <textarea id="message" placeholder="Enter your message"></textarea>
                
                <button type="submit">SEND</button>
            </form>
        </div>
    </div>
</div>

        
        `;
}

// Function to show Security Info
function showSecurity() {
    document.getElementById("content-container").innerHTML = `
        <h2>Security Settings</h2>
        <p>Manage your account security settings here. Update your password, enable two-factor authentication, and review recent activity.</p>
    `;
}

// Function to log out
function logOut() {
    document.getElementById("content-container").innerHTML = `
        <h2>Log Out</h2>
        <p>You have successfully logged out. See you next time!</p>
    `;
}
