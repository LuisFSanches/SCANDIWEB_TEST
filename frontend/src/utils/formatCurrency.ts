export const formatCurrency = (value: number) => {
  const formattedValue = value.toLocaleString("en-US", {
    style: "currency",
    currency: "USD",
  });
  return formattedValue;
};
