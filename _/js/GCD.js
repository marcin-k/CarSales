function find_ratio(x,y) {
   var gcd=calc(x,y);
   var r1=x/gcd;
   var r2=y/gcd;
   var ratio=r1+":"+r2;
   console.log(ratio);
}

function calc(n1,n2) {
   var num1,num2;
   if(n1 < n2) {
      num1=n1;num2=n2;
   }
   else{
      num1=n2;
      num2=n1;
   }
   var remain=num2%num1;
   while(remain>0){
      num2=num1;num1=remain;remain=num2%num1;
   }
   return num1;
}
find_ratio();
