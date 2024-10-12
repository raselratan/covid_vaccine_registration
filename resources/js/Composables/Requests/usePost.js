export function usePost() {

  const postData = async (url, payload, token = null) => {
    try {
      const headers = {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      };

      // Add token to headers if provided
      if (token) {
        headers['Authorization'] = `Bearer ${token}`;
      }

      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      
      if (csrfToken) {
        headers['X-CSRF-TOKEN'] = csrfToken;
      }

      const response = await fetch(url, {
        method: 'POST',
        headers,
        body: JSON.stringify(payload),
      });

      // Check if the response status indicates success
      if (!response.ok) {
        // If the response is not OK (e.g., status code 422), throw an error
        const errorData = await response.json(); // Parse the error response body
        throw new Error(JSON.stringify({ status: response.status, ...errorData }));
      }

      const data = await response.json(); // Parse the JSON data from the successful response
      return data;

    } catch (err) {
      // Here, the error can be a failed network request or a custom error thrown above
      return err.message ? JSON.parse(err.message) : { error: 'An unexpected error occurred' };
    }
  };

  return { postData };
}
