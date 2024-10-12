export function useFetch() {

  const fetchData = async (url) => {
    try {
      const response = await fetch(url); // Fetch data from the API

      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      
      const data = await response.json(); // Parse the JSON data

      return data;

    } catch (err) {

      return err.message; // return error message if request fails

    }
  };

  return { fetchData };
}
