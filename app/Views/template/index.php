<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FREEWORK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .slider-wrapper {
            position: relative;
        }

        .slider-wrapper .slide-button {
            position: absolute;
            top: 50%;
            outline: none;
            border: none;
            height: 50px;
            width: 50px;
            z-index: 5;
            color: #fff;
            display: flex;
            cursor: pointer;
            font-size: 2.2rem;
            background: #000;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transform: translateY(-50%);
        }

        .slider-wrapper .slide-button:hover {
            background: #404040;
        }

        .slider-wrapper .slide-button#prev-slide {
            left: -25px;
            display: none;
        }

        .slider-wrapper .slide-button#next-slide {
            right: -25px;
        }

        .slider-wrapper .image-list {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            gap: 18px;
            font-size: 0;
            list-style: none;
            margin-bottom: 30px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .slider-wrapper .image-list::-webkit-scrollbar {
            display: none;
        }

        .slider-wrapper .image-list .image-item {
            width: 325px;
            height: 400px;
            object-fit: cover;
        }

        .container .slider-scrollbar {
            height: 24px;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .slider-scrollbar .scrollbar-track {
            background: #ccc;
            width: 100%;
            height: 2px;
            display: flex;
            align-items: center;
            border-radius: 4px;
            position: relative;
        }

        .slider-scrollbar:hover .scrollbar-track {
            height: 4px;
        }

        .slider-scrollbar .scrollbar-thumb {
            position: absolute;
            background: #000;
            top: 0;
            bottom: 0;
            width: 50%;
            height: 100%;
            cursor: grab;
            border-radius: inherit;
        }

        .slider-scrollbar .scrollbar-thumb:active {
            cursor: grabbing;
            height: 8px;
            top: -2px;
        }

        .slider-scrollbar .scrollbar-thumb::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: -10px;
            bottom: -10px;
        }

        /* Styles for mobile and tablets */
        @media only screen and (max-width: 1023px) {
            .slider-wrapper .slide-button {
                display: none !important;
            }

            .slider-wrapper .image-list {
                gap: 10px;
                margin-bottom: 15px;
                scroll-snap-type: x mandatory;
            }

            .slider-wrapper .image-list .image-item {
                width: 280px;
                height: 380px;
            }

            .slider-scrollbar .scrollbar-thumb {
                width: 20%;
            }
        }
    </style>
</head>

<body>
    <header>
        <!-- Jumbotron -->
        <?= $this->include('template/navbar'); ?>
        <!-- Jumbotron -->
    </header>

    <?= $this->renderSection('content') ?>

    <!-- footer -->
    <!-- Remove the container if you want to extend the Footer to full width. -->
    <?= $this->include('template/footer'); ?>
    <!-- End of .container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <script>
        const initSlider = () => {
            const imageList = document.querySelector(".slider-wrapper .image-list");
            const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
            const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
            const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
            const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

            // Handle scrollbar thumb drag
            scrollbarThumb.addEventListener("mousedown", (e) => {
                const startX = e.clientX;
                const thumbPosition = scrollbarThumb.offsetLeft;
                const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;

                // Update thumb position on mouse move
                const handleMouseMove = (e) => {
                    const deltaX = e.clientX - startX;
                    const newThumbPosition = thumbPosition + deltaX;

                    // Ensure the scrollbar thumb stays within bounds
                    const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
                    const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;

                    scrollbarThumb.style.left = `${boundedPosition}px`;
                    imageList.scrollLeft = scrollPosition;
                }

                const handleMouseUp = () => {
                    // Remove event listeners on mouse up
                    document.removeEventListener("mousemove", handleMouseMove);
                    document.removeEventListener("mouseup", handleMouseUp);
                }

                // Add event listeners for drag interaction
                document.addEventListener("mousemove", handleMouseMove);
                document.addEventListener("mouseup", handleMouseUp);
            });

            // Slide images according to the slide button clicks
            slideButtons.forEach(button => {
                button.addEventListener("click", () => {
                    const direction = button.id === "prev-slide" ? -1 : 1;
                    const scrollAmount = imageList.clientWidth * direction;
                    imageList.scrollBy({
                        left: scrollAmount,
                        behavior: "smooth"
                    });
                });
            });

            // Show or hide slide buttons based on scroll position
            const handleSlideButtons = () => {
                slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
                slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
            }

            // Update scrollbar thumb position based on image scroll
            const updateScrollThumbPosition = () => {
                const scrollPosition = imageList.scrollLeft;
                const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
                scrollbarThumb.style.left = `${thumbPosition}px`;
            }

            // Call these two functions when image list scrolls
            imageList.addEventListener("scroll", () => {
                updateScrollThumbPosition();
                handleSlideButtons();
            });
        }

        window.addEventListener("resize", initSlider);
        window.addEventListener("load", initSlider);
    </script>
</body>

</html>