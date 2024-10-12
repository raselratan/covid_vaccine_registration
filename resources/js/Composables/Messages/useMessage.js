import Swal from 'sweetalert2'

export function useMessage() {

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });

    const errorMessage = (message = null) => {

        Toast.fire({
            icon: "error",
            title: message ? message : 'Something went wrong!'
        });
    };
  
    const successMessage = (message = null) => {
        Toast.fire({
            icon: "success",
            title: message ? message : 'Something went wrong!'
        });
    };

    const warningMessage = (message = null) => {
        Toast.fire({
            icon: "warning",
            title: message ? message : 'Something went wrong!'
        });
    };

    return { errorMessage, successMessage, warningMessage };
}
  