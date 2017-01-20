console.log("Success");

var closeBtns = document.getElementsByClassName("close");

numOfNotif = closeBtns.length;

for (let i = 0; i < numOfNotif; ++i) {
  closeBtns[i].addEventListener("mousedown", function() {
    let rng = document.createRange();
    if (numOfNotif == 1)
      rng.selectNode(this.parentNode.parentNode.parentNode);
    else
      rng.selectNode(this.parentNode);
    console.log(this.parentNode);
    rng.deleteContents();
    let req = new XMLHttpRequest();
    req.open('GET', 'notification.php', true);
    req.onload = function(e) {
      console.log('Request recieved\n');
      dump(req.request);
    }
    req.responseType = "text";
    req.send({id: this.id});
    numOfNotif--;
  });
}