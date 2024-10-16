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
        <h2>Order History</h2>
        <p>Check your past orders and track current ones. View details such as order status, items purchased, and delivery dates.</p>
    `;
}

// Function to show Wishlist
function showWishlist() {
    document.getElementById("content-container").innerHTML = `
        <h2>Wishlist</h2>
        <p>Here you can view your saved items for future purchases. Add and remove items from your wishlist.</p>
    `;
}

// Function to show Contact Info
function showContact() {
    document.getElementById("content-container").innerHTML = `
        <h2>Contact Us</h2>
        <p>If you have any questions or need help, feel free to contact us via email or phone. We're here to assist you!</p>
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
