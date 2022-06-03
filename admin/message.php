<?php
if(isset($_SESSION['message']) && isset($_SESSION['msg_type'])) {
    if($_SESSION['msg_type'] == 'success') {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>".$_SESSION['message']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
    elseif($_SESSION['msg_type'] == 'error') {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['message']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
    elseif($_SESSION['msg_type'] == 'warning') {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['message']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
    unset($_SESSION['message']);
    unset($_SESSION['msg_type']);
}