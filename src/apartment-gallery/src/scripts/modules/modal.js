import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock';

const modal = () => {
	let currentModal, currentCross;

	const triggers = document.querySelectorAll( '.ag-benefit' );
	const modals = document.querySelectorAll( '.ag-modal' );
	const crosses = document.querySelectorAll( '.ag-modal__cross' );

	const openModal = ( event, trigger ) => {
		if ( event.target === currentModal || event.target === currentCross ) {
			return;
		}

		modals.forEach( ( modal ) => {
			if ( modal.dataset.modalId === trigger.dataset.triggerId ) {
				modal.classList.remove( 'ag-modal--hidden' );

				currentModal = modal;
				currentCross = modal.querySelector( '.ag-modal__cross' );

				disableBodyScroll( currentModal );
			}
		} );
	};

	const closeModal = ( { modal = null, cross = null } ) => {
		let currentModal = modal ? modal : cross.parentNode.parentNode;

		if ( currentModal.classList.contains( 'ag-modal--hidden' ) ) {
			return;
		}

		currentModal.classList.add( 'ag-modal--hidden' );

		enableBodyScroll( currentModal );
	};

	const triggerClickHandler = ( trigger ) => {
		trigger.addEventListener( 'click', ( event ) =>
			openModal( event, trigger )
		);
	};

	const modalClickHandler = ( modal ) => {
		modal.addEventListener( 'click', () => closeModal( { modal } ) );
	};

	const crossClickHandler = ( cross ) => {
		cross.addEventListener( 'click', () => closeModal( { cross } ) );
	};

	if ( triggers.length > 0 ) {
		triggers.forEach( ( trigger ) => triggerClickHandler( trigger ) );
	}

	if ( modals.length > 0 ) {
		modals.forEach( ( modal ) => modalClickHandler( modal ) );
	}

	if ( crosses.length > 0 ) {
		crosses.forEach( ( cross ) => crossClickHandler( cross ) );
	}
};

export default modal;
