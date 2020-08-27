function changeGroup($value) {
    if($value == 0) {
        window.location.href = window.location.origin+"/?controller=classes&action=add";
    }    
}
function back() {
    window.history.back();
}