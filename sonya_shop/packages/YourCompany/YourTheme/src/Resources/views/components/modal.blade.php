{{--
    Modal Component

    Props:
    - $id (string): Unique modal ID
    - $title (string): Modal title
    - $size (string): Modal size (sm, md, lg, xl)
--}}

@props([
    'id' => 'modal',
    'title' => '',
    'size' => 'md',
])

<div class="modal" id="{{ $id }}" style="display: none;">
    <div class="modal-overlay"></div>
    <div class="modal-container modal-{{ $size }}">
        <div class="modal-header">
            @if($title)
                <h3 class="modal-title">{{ $title }}</h3>
            @endif
            <button class="modal-close" aria-label="Close modal">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
        @isset($footer)
        <div class="modal-footer">
            {{ $footer }}
        </div>
        @endisset
    </div>
</div>

@push('css')
<style>
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
    }

    .modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
    }

    .modal-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        border-radius: 12px;
        box-shadow: 0 20px 25px rgba(0, 0, 0, 0.15);
        max-height: 90vh;
        overflow-y: auto;
        width: 90%;
    }

    .modal-sm { max-width: 400px; }
    .modal-md { max-width: 600px; }
    .modal-lg { max-width: 800px; }
    .modal-xl { max-width: 1200px; }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem;
        border-bottom: 1px solid #e0e0e0;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
    }

    .modal-close {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s;
        border-radius: 50%;
    }

    .modal-close:hover {
        background-color: #f5f5f5;
    }

    .modal-body {
        padding: 1.5rem;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        padding: 1.5rem;
        border-top: 1px solid #e0e0e0;
    }
</style>
@endpush

@push('scripts')
<script>
    (function() {
        const modal = document.getElementById('{{ $id }}');
        if (!modal) return;

        const overlay = modal.querySelector('.modal-overlay');
        const closeBtn = modal.querySelector('.modal-close');

        function openModal() {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', closeModal);
        }

        if (overlay) {
            overlay.addEventListener('click', closeModal);
        }

        // Close on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.style.display === 'block') {
                closeModal();
            }
        });

        // Expose open/close functions globally
        window['openModal_{{ $id }}'] = openModal;
        window['closeModal_{{ $id }}'] = closeModal;
    })();
</script>
@endpush
