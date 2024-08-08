// Get a reference to the collection
const collectionRef = db.collection(CatalogueBP);

// Get all documents in the collection
collectionRef.get()
  .then((querySnapshot) => {
    querySnapshot.forEach((doc) => {
      const data = doc.data();
      
      // Access the fields by their names
      const id = doc.id;
      const Name = data.Name; // Replace 'field1' with the actual field name
      const Img = data.Image; // Replace 'field2' with the actual field name
      const Description = data.Description;
      const Benefits = data.Benefits;
      const Price = data.Price;
      // Do something with the data
      //console.log(id, Name, Img, Description, Benefits, Price);
    });
  })
  .catch((error) => {
    console.error('Error getting documents: ', error);
  });


    // Function to add item to the cart
    function addToCart(itemId) {
      // Assuming you have a collection named 'cart' in Firestore
      const cartRef = db.collection('cart');

      // Assuming you have an item document with a unique ID
      const itemDocRef = cartRef.doc(itemId);

      // Get the current quantity in the cart (default to 0 if not exists)
      itemDocRef.get().then((doc) => {
        const currentQuantity = doc.exists ? doc.data().quantity : 0;

        // Increment the quantity
        const newQuantity = currentQuantity + 1;

        // Update or create the document in the cart collection
        return itemDocRef.set({ quantity: newQuantity });
      }).then(() => {
        alert('Item added to cart!');
      }).catch((error) => {
        console.error('Error adding to cart:', error);
      });
    }
  

