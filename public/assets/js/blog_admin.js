document.getElementById('sidebarCollapse').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('active');
});

document.documentElement.style.setProperty('--primary-dark', '#332D56');
document.documentElement.style.setProperty('--primary-medium', '#4E6688');
document.documentElement.style.setProperty('--primary-light', '#71C0BB');
document.documentElement.style.setProperty('--accent-color', '#E3EEB2');

tinymce.init({
    selector: '#postContent',
    plugins: 'advlist autolink lists link image charmap preview anchor table',
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    height: 500,
    content_style: 'body { font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; font-size: 16px; }'

});

document.getElementById('postTitle').addEventListener('input', function() {
    const title = this.value;
    const slug = title.toLowerCase()
        .replace(/[^\w\s]/gi, '')
        .replace(/\s+/g, '-')
        .replace(/--+/g, '-');
    document.getElementById('postSlug').value = slug;
    
    if (!document.getElementById('metaTitle').value) {
        document.getElementById('metaTitle').value = title + ' - আমার ব্লগ';
    }
});

const featuredImageUpload = document.getElementById('featuredImageUpload');
const featuredImageInput = document.getElementById('featuredImageInput');
const featuredImagePreview = document.getElementById('featuredImagePreview');

featuredImageUpload.addEventListener('click', function() {
    featuredImageInput.click();
});

featuredImageInput.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            featuredImagePreview.src = e.target.result;
            featuredImagePreview.style.display = 'block';
            featuredImageUpload.querySelector('i').style.display = 'none';
            featuredImageUpload.querySelector('p').style.display = 'none';
        }
        reader.readAsDataURL(file);
    }
});

const imageUploadContainer = document.getElementById('imageUploadContainer');
const categoryImage = document.getElementById('categoryImage');
const imagePreview = document.getElementById('imagePreview');

imageUploadContainer.addEventListener('click', () => {
    categoryImage.click();
});

categoryImage.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
            imageUploadContainer.style.display = 'none';
        };
        reader.readAsDataURL(file);
    }
});


