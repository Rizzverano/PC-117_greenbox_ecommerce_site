        // Handle image upload and preview
        document.getElementById('productImages').addEventListener('change', function(e) {
        const previewContainer = document.getElementById('previewContainer');
        previewContainer.innerHTML = '';

        if (this.files.length > 0) {
        document.querySelector('#imagePreview p').style.display = 'none';

        for (let i = 0; i < this.files.length; i++) { const file=this.files[i]; if (file.type.match('image.*')) { const
            reader=new FileReader(); reader.onload=function(e) { const img=document.createElement('img');
            img.src=e.target.result; img.className='img-thumbnail m-2 preview-image' ; img.style.maxHeight='100px' ;
            previewContainer.appendChild(img); // Show all preview images const
            previewImages=document.querySelectorAll('.preview-image'); previewImages.forEach(img=> img.style.display =
            'inline-block');
            }

            reader.readAsDataURL(file);
            }
            }
            } else {
            document.querySelector('#imagePreview p').style.display = 'block';
            }
            });

            // Handle drag and drop
            const uploadContainer = document.getElementById('uploadContainer');

            uploadContainer.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadContainer.style.borderColor = 'var(--primary-green)';
            uploadContainer.style.backgroundColor = 'rgba(40, 167, 69, 0.1)';
            });

            uploadContainer.addEventListener('dragleave', () => {
            uploadContainer.style.borderColor = '#ccc';
            uploadContainer.style.backgroundColor = '';
            });

            uploadContainer.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadContainer.style.borderColor = '#ccc';
            uploadContainer.style.backgroundColor = '';

            const input = document.getElementById('productImages');
            input.files = e.dataTransfer.files;

            // Trigger the change event manually
            const event = new Event('change');
            input.dispatchEvent(event);
            });

            // Submit button handler
            document.getElementById('submitReturn').addEventListener('click', function() {
            const reason = document.getElementById('returnReason').value;

            if (!reason) {
            alert('Please select a reason for your return.');
            return;
            }

            // In a real application, you would submit the form data to a server
            alert('Your return request has been submitted successfully!');

            // Reset form (for demo purposes)
            document.getElementById('returnReason').selectedIndex = 0;
            document.getElementById('returnDetails').value = '';
            document.getElementById('productImages').value = '';
            document.getElementById('previewContainer').innerHTML = '';
            document.querySelector('#imagePreview p').style.display = 'block';
            });
