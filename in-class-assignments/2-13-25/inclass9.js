/* 
Bilash Sarkar
2-13-25
*/


const catNames = ["Jerry", "Kiki", "Pinecone", "Cheeto", "Larry"]

function isPinecone(names){
    return names.includes("Pinecone");
}

console.log(isPinecone(catNames));


const catNames2 = catNames.filter(name => name === "Pinecone");
console.log(catNames2);