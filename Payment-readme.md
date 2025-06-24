## 🔁 Payment Flow – Sequence Diagram

```mermaid
sequenceDiagram
    participant User
    participant Frontend (Vue/React)
    participant Backend (Laravel)
    participant PaymentService
    participant PaymentAdapter (Iyzico/Sipay)
    participant PaymentProvider API

    User->>Frontend (Vue/React): Selects court + time slot
    Frontend->>Backend (Laravel): Sends reservation + payment details
    Backend->>PaymentService: Initiates payment
    PaymentService->>PaymentAdapter: Delegates to correct adapter
    PaymentAdapter->>PaymentProvider API: Calls charge or init API
    PaymentProvider API-->>PaymentAdapter: Responds with success/redirect
    PaymentAdapter-->>PaymentService: Returns payment response
    PaymentService-->>Backend: Logs transaction + result
    Backend-->>Frontend: Sends response or redirect URL
    Frontend->>User: Redirects or shows confirmation
