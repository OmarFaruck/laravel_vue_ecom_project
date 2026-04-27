export function mockClientItems(count) {
  const items = [];
  for (let i = 0; i < count; i++) {
    items.push({
      name: `Name ${i + 1}`,
      address: `Address ${i + 1}`,
      height: Math.floor(Math.random() * 50) + 150,
      weight: Math.floor(Math.random() * 50) + 50,
      age: Math.floor(Math.random() * 50) + 18,
      favouriteSport: `Sport ${i + 1}`,
      favouriteFruits: `Fruit ${i + 1}`,
    });
  }
  return items;
}