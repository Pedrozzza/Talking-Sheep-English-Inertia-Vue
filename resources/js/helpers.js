export function strSlug(string) {
    return string
        .replace(/&&+/g, "&")
        .replace(/&+/g, "a")
        .replace(/\s+/g, "-")
        .replace(/--+/g, "-")
        .toLowerCase()
        .trim();

}
