//past 1
// // weak typing
// tries to convert types, this is common in interpreted languages, typing is less strict
console.log(1 + '7'); // => '17'

const output = 1 + '7';
console.log(typeof output);


//part 2;
console.log(Number(true)); //returns a 1
console.log(Number(false)); //returns a 0
//true is represented by 1 and false is represented by 0



console.log(Boolean(0))//returns false
console.log(Boolean(1)) //returns true
console.log(Boolean('0')) //returns true
//booling of 0 and 1 return to appropriate true and false results. However a string '0' returns true despite being a 0 because 
//the booling expression returns true if the string is not empty. otherwise it returns false.

