const firstLettertoUppercase = str => {
  const lowerStr = str.toLowerCase();
  const res = lowerStr.replace(/^./, lowerStr[0].toUpperCase());
  return res;
};

export default { firstLettertoUppercase };
